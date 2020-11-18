<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getTrangChu()
    {
        if (Auth::check()) {
            $loai = ProductType::all();
            $sp = Product::all();
            $nd = count(User::all());
            $dh = count(Bill::all());
            return view('admin.trangchu', compact('loai', 'sp', 'nd', 'dh'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getTaiKhoan()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('admin.taikhoan', compact('users'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getThemTaiKhoan()
    {
        if (Auth::check()) {
            return view('admin.ql_taikhoan.them');
        } else {
            return view('page.dangnhap');
        }
    }

    public function postThemTaiKhoan(Request $req)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6|max:20',
                    'full_name' => 'required',
                    'phone' => 'required|regex:/[0-9]{10}/',
                    'address' => 'required'
                ],
                [
                    'full_name.required' => 'vui lòng nhập họ tên,',
                    'email.required' => 'vui lòng nhập email, ',
                    'email.email' => 'không đúng định dạng email ,',
                    'email.unique' => 'email đã có người sử dụng ,',
                    'password.required' => 'vui lòng nhập mật khẩu, ',
                    'password.min' => 'mật khẩu ít nhất 6 ký tự ,',
                    'phone.required' => 'vui lòng nhập số điện thoại ,',
                    'phone.regex' => 'vui lòng nhập đúng dạng số điện thoại ,',
                    'address.required' => 'vui lòng nhập địa chỉ ,',

                ]
            );
            $user = new User();
            $user->full_name = $req->full_name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->quyenhan = $req->quyenhan;
            $user->save();
            return redirect()->back()->with('thongbao_themtaikhoan', 'Đã thêm tài khoản thành công');
        } else {
            return view('page.dangnhap');
        }
    }

    public function getXoaTaiKhoan($id)
    {
        if (Auth::check()) {
            User::where('id', $id)->first()->delete();
            return redirect()->back();
        } else {
            return view('page.dangnhap');
        }
    }

    public function getSuaTaiKhoan($id)
    {
        if (Auth::check()) {
            $user = User::where('id', $id)->first();
            return view('admin.ql_taikhoan.sua', compact('user'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function postSuaTaiKhoan(Request $req, $id)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'full_name' => 'required',
                    'phone' => 'required|regex:/[0-9]{10}/',
                    'address' => 'required'
                ],
                [
                    'full_name.required' => 'vui lòng nhập họ tên,',
                    'phone.required' => 'vui lòng nhập số điện thoại ,',
                    'phone.regex' => 'vui lòng nhập đúng dạng số điện thoại ,',
                    'address.required' => 'vui lòng nhập địa chỉ ,',

                ]
            );

            if ($req->email != "") {

                $this->validate(
                    $req,
                    [
                        'email' => 'email|unique:users,email',
                    ],
                    [
                        'email.email' => 'không đúng định dạng email ,',
                        'email.unique' => 'email đã có người sử dụng ,',
                    ]
                );

                if ($req->password != "") {

                    $this->validate(
                        $req,
                        [
                            'password' => 'min:6|max:20',
                        ],
                        [
                            'password.min' => 'mật khẩu ít nhất 6 ký tự ,',
                            'password.max' => 'mật khẩu không quá 20 ký tự ,'
                        ]
                    );

                    $pass = Hash::make($req->password);
                    User::where('id', $id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'email' => $req->email,
                            'password' => $pass,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                } else {
                    User::where('id', $id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'email' => $req->email,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                }
            } else {
                if ($req->password != "") {

                    $this->validate(
                        $req,
                        [
                            'password' => 'min:6|max:20',
                        ],
                        [
                            'password.min' => 'mật khẩu ít nhất 6 ký tự ,',
                            'password.max' => 'mật khẩu không quá 20 ký tự ,'
                        ]
                    );

                    $pass = Hash::make($req->password);
                    User::where('id', $id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'password' => $pass,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                } else {
                    User::where('id', $id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                }
            }
            return redirect()->back()->with('thongbao_suataikhoan', 'Đã Lưu tài khoản thành công');
        } else {
            return view('page.dangnhap');
        }
    }

    public function getSanPham()
    {
        if (Auth::check()) {
            $products = \DB::select("SELECT sp.id,sp.name,tp.name as loai,sp.description,sp.unit_price,
        sp.promotion_price,sp.image,sp.unit,sp.new
        FROM products as sp, type_products as tp
        WHERE sp.id_type=tp.id");
            return view('admin.sanpham', compact('products'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getXoaSanPham($id)
    {
        if (Auth::check()) {
            $image = Product::where('id', $id)->first();
            $image_path = "source/image/product/" . $image->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            Product::where('id', $id)->first()->delete();
            return redirect()->back();
        } else {
            return view('page.dangnhap');
        }
    }

    public function getThemSanPham()
    {
        if (Auth::check()) {
            $products_type = ProductType::all();
            return view('admin.ql_sanpham.them', compact('products_type'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function postThemSanPham(Request $req)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'name' => 'required',
                    'description' => 'required',
                    'unit_price' => 'required',
                    'unit' => 'required',
                    'image' => 'required'
                ],
                [
                    'name.required' => 'vui lòng nhập tên sản phẩm,',
                    'description.required' => 'vui lòng nhập mô tả sản phẩm, ',
                    'unit_price.required' => 'vui lòng nhập đơn giá sản phẩm , ',
                    'unit.required' => 'vui lòng nhập đơn vị , ',
                    'image.required' => 'vui lòng chọn ảnh ,'
                ]
            );

            if ($req->hasFile('image')) {

                $product = new Product();
                $product->name = $req->name;
                $product->id_type = $req->id_type;
                $product->description = $req->description;
                $product->unit_price = $req->unit_price;

                if ($req->promotion_price != "") {
                    $product->promotion_price = $req->promotion_price;
                } else {
                    $product->promotion_price = 0;
                }

                $product->unit = $req->unit;
                $product->new = $req->new;

                $file = $req->file('image');
                $file->move('source/image/product/', $file->getClientOriginalName());

                $product->image = $file->getClientOriginalName();

                $product->save();
                return redirect()->back()->with(['flag' => 'success', 'thongbao_themsanpham' => 'thêm sản phẩm thành công']);
            } else {
                return redirect()->back()->with(['flag' => 'danger', 'thongbao_themsanpham' => 'thêm sản phẩm không thành công']);
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function getSuaSanPham($id)
    {
        if (Auth::check()) {
            $product = Product::where('id', $id)->first();
            $products_type = ProductType::all();
            return view('admin.ql_sanpham.sua', compact('product', 'products_type'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function postSuaSanPham(Request $req, $id)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'name' => 'required',
                    'description' => 'required',
                    'unit_price' => 'required',
                    'unit' => 'required',
                ],
                [
                    'name.required' => 'vui lòng nhập tên sản phẩm,',
                    'description.required' => 'vui lòng nhập mô tả sản phẩm, ',
                    'unit_price.required' => 'vui lòng nhập đơn giá sản phẩm , ',
                    'unit.required' => 'vui lòng nhập đơn vị , ',
                ]
            );

            if ($req->image == null) {
                Product::where('id', $id)
                    ->update([
                        'name' => $req->name,
                        'id_type' => $req->id_type,
                        'description' => $req->description,
                        'unit_price' => $req->unit_price,
                        'promotion_price' => $req->promotion_price,
                        'unit' => $req->unit,
                        'new' => $req->new

                    ]);
                return redirect()->back()->with(['flag' => 'success', 'thongbao_suasanpham' => 'sửa sản phẩm thành công']);
            } else {
                if ($req->hasFile('image')) {
                    $image = Product::where('id', $id)->first();
                    $image_path = "source/image/product/" . $image->image;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }

                    $file = $req->file('image');
                    $file->move('source/image/product/', $file->getClientOriginalName());

                    Product::where('id', $id)
                        ->update([
                            'name' => $req->name,
                            'id_type' => $req->id_type,
                            'description' => $req->description,
                            'unit_price' => $req->unit_price,
                            'promotion_price' => $req->promotion_price,
                            'unit' => $req->unit,
                            'new' => $req->new,
                            'image' => $file->getClientOriginalName()

                        ]);
                    return redirect()->back()->with(['flag' => 'success', 'thongbao_suasanpham' => 'sửa sản phẩm thành công']);
                } else {
                    return redirect()->back()->with(['flag' => 'danger', 'thongbao_suasanpham' => 'sửa sản phẩm không thành công']);
                }
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function getLoaiSanPham()
    {
        if (Auth::check()) {
            $type_products = ProductType::all();
            return view('admin.loaisanpham', compact('type_products'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getThemLoaiSanPham()
    {
        if (Auth::check()) {
            return view('admin.ql_loaisanpham.them');
        } else {
            return view('page.dangnhap');
        }
    }

    public function postThemLoaiSanPham(Request $req)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'name' => 'required',
                    'description' => 'required',
                    'image' => 'required'
                ],
                [
                    'name.required' => 'vui lòng nhập tên sản phẩm,',
                    'description.required' => 'vui lòng nhập mô tả sản phẩm, ',
                    'image.required' => 'vui lòng chọn ảnh ,'
                ]
            );

            if ($req->hasFile('image')) {

                $productType = new ProductType();
                $productType->name = $req->name;
                $productType->description = $req->description;

                $file = $req->file('image');
                $file->move('source/image/producttype/', $file->getClientOriginalName());

                $productType->image = $file->getClientOriginalName();

                $productType->save();
                return redirect()->back()->with(['flag' => 'success', 'thongbao_themloaisanpham' => 'thêm loại sản phẩm thành công']);
            } else {
                return redirect()->back()->with(['flag' => 'danger', 'thongbao_themloaisanpham' => 'thêm loại sản phẩm không thành công']);
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function getXoaLoaiSanPham($id)
    {
        if (Auth::check()) {
            $image = ProductType::where('id', $id)->first();
            $image_path = "source/image/producttype/" . $image->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            ProductType::where('id', $id)->first()->delete();
            return redirect()->back();
        } else {
            return view('page.dangnhap');
        }
    }

    public function getSuaLoaiSanPham($id)
    {
        if (Auth::check()) {
            $type_products = ProductType::where('id', $id)->first();
            return view('admin.ql_loaisanpham.sua', compact('type_products'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function postSuaLoaiSanPham(Request $req, $id)
    {

        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'name' => 'required',
                    'description' => 'required',
                ],
                [
                    'name.required' => 'vui lòng nhập tên sản phẩm,',
                    'description.required' => 'vui lòng nhập mô tả sản phẩm, ',
                ]
            );
            if ($req->image == null) {
                ProductType::where('id', $id)
                    ->update([
                        'name' => $req->name,
                        'description' => $req->description,
                    ]);
                return redirect()->back()->with(['flag' => 'success', 'thongbao_sualoaisanpham' => 'sửa loại sản phẩm thành công']);
            } else {
                if ($req->hasFile('image')) {
                    $image = ProductType::where('id', $id)->first();
                    $image_path = "source/image/producttype/" . $image->image;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }

                    $file = $req->file('image');
                    $file->move('source/image/producttype/', $file->getClientOriginalName());
                    ProductType::where('id', $id)
                        ->update([
                            'name' => $req->name,
                            'description' => $req->description,
                            'image' => $file->getClientOriginalName()
                        ]);
                    return redirect()->back()->with(['flag' => 'success', 'thongbao_sualoaisanpham' => 'sửa loại sản phẩm thành công']);
                } else {
                    return redirect()->back()->with(['flag' => 'danger', 'thongbao_sualoaisanpham' => 'sửa loại sản phẩm không thành công']);
                }
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function getSlide()
    {
        if (Auth::check()) {
            $slide = Slide::all();
            return view('admin.slide', compact('slide'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getThemSlide()
    {
        if (Auth::check()) {
            return view('admin.ql_slide.them');
        } else {
            return view('page.dangnhap');
        }
    }

    public function postThemSlide(Request $req)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'link' => 'required',
                    'image' => 'required'
                ],
                [
                    'link.required' => 'vui lòng nhập link slide,',
                    'image.required' => 'vui lòng nhập image slide, '
                ]
            );

            if ($req->hasFile('image')) {

                $slide = new Slide();
                $slide->link = $req->link;
                $slide->show = $req->show;

                $file = $req->file('image');
                $file->move('source/image/slide/', $file->getClientOriginalName());

                $slide->image = $file->getClientOriginalName();
                $slide->save();

                return redirect()->back()->with(['flag' => 'success', 'thongbao_themslide' => 'thêm slide thành công']);
            } else {
                return redirect()->back()->with(['flag' => 'danger', 'thongbao_themslide' => 'thêm slide không thành công']);
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function getXoaSlide($id)
    {
        if (Auth::check()) {
            $image = Slide::where('id', $id)->first();
            $image_path = "source/image/slide/" . $image->image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            Slide::where('id', $id)->first()->delete();
            return redirect()->back();
        } else {
            return view('page.dangnhap');
        }
    }

    public function getSuaSlide($id)
    {
        if (Auth::check()) {
            $slide = Slide::where('id', $id)->first();
            return view('admin.ql_slide.sua', compact('slide'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function postSuaSlide(Request $req, $id)
    {
        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'link' => 'required',
                ],
                [
                    'link.required' => 'vui lòng nhập link slide,',
                ]
            );

            if ($req->image == null) {
                Slide::where('id', $id)
                    ->update([
                        'link' => $req->link,
                        'show' => $req->show
                    ]);
                return redirect()->back()->with(['flag' => 'success', 'thongbao_suaslide' => 'sửa slide thành công']);
            } else {
                if ($req->hasFile('image')) {
                    $image = Slide::where('id', $id)->first();
                    $image_path = "source/image/slide/" . $image->image;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }

                    $file = $req->file('image');
                    $file->move('source/image/slide/', $file->getClientOriginalName());
                    Slide::where('id', $id)
                        ->update([
                            'link' => $req->link,
                            'show' => $req->show,
                            'image' => $file->getClientOriginalName()
                        ]);
                    return redirect()->back()->with(['flag' => 'success', 'thongbao_suaslide' => 'sửa slide thành công']);
                } else {
                    return redirect()->back()->with(['flag' => 'danger', 'thongbao_suaslide' => 'sửa slide không thành công']);
                }
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function getDonHang()
    {
        if (Auth::check()) {
            $donhang = \DB::select("SELECT ct.id as id_user,ct.name,
        ct.gender,ct.email,ct.address,ct.phone_number,ct.note,b.id as id_bill,
        b.date_order,b.total,b.payment
        FROM customer ct,bills b,products p
        WHERE ct.id = b.id_customer GROUP BY (b.id)");
            return view('admin.donhang', compact('donhang'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getXoaDonHang($id)
    {
        if (Auth::check()) {
            $bill = Bill::where('id', $id)->first();

            Customer::where('id', $bill->id_customer)->first()->delete();

            $billdetail = BillDetail::where('id_bill', $id)->get();
            foreach ($billdetail as $bd) {
                $bd->delete();
            }
            Bill::where('id', $id)->first()->delete();

            return redirect()->back();
        } else {
            return view('page.dangnhap');
        }
    }

    public function getChiTietDonHang($id)
    {
        if (Auth::check()) {
            $billdetaill = \DB::select("SELECT bt.id, bt.id_bill, bt.id_product, bt.quantity,
        bt.unit_price,p.name,p.image
        FROM bill_detail bt, products p
         WHERE bt.id_product=p.id AND id_bill=$id ");
            return view('admin.ql_donhang.chitietdonhang', compact('billdetaill', 'id'));
        } else {
            return view('page.dangnhap');
        }
    }

    public function getXoaChiTietDonHang($id)
    {
        if (Auth::check()) {
            $billdetail = BillDetail::all();
            if (count($billdetail) == 1) {
                $bd = BillDetail::where('id', $id)->first();
                $b = Bill::where('id', $bd->id_bill)->first();
                $ct = Customer::where('id', $b->id_customer)->first();
                $bd->delete();
                $b->delete();
                $ct->delete();
            } else {
                BillDetail::where('id', $id)->first()->delete();
            }

            return redirect()->back();
        } else {
            return view('page.dangnhap');
        }
    }
}
