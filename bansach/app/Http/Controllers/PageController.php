<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Mail;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::where('show', 1)->get();
        // print_r($slide);
        // exit;
        // return view('page.trangchu',['slide'=>$slide]);
        // $new_product=Product::where('new',1)->get();
        $new_product = Product::where('new', 1)->paginate(8);
        $sale_product = Product::where('promotion_price', '!=', 0)->paginate(8);
        return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));
    }

    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $spk_theoloai = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
        return view('page.loai_sanpham', compact('sp_theoloai', 'spk_theoloai', 'loai', 'loai_sp'));
        // echo "lalal".$type;
    }

    public function getChitiet($id)
    {
        $ct_sp = Product::where('id', $id)->first();
        $sp_theoloai = Product::where('id_type', $ct_sp->id_type)->paginate(3);
        $banchay = \DB::select('SELECT products.id, products.name,products.id_type,products.description,products.unit_price,products.promotion_price,products.image,products.unit,products.new
        FROM products, bill_detail
        WHERE bill_detail.id_product = products.id
        GROUP BY bill_detail.id_product
        ORDER BY count(bill_detail.quantity) DESC
        LIMIT 4');
        $new_product = Product::where('new', 1)->paginate(4);
        return view('page.chitiet_sanpham', compact('ct_sp', 'sp_theoloai', 'banchay', 'new_product'));
    }

    public function getLienHe()
    {
        return view('page.lienhe');
    }

    public function getGioiThieu()
    {
        $ct = Customer::all();
        $lsp = ProductType::all();
        $sp = Product::all();

        return view('page.gioithieu', compact('ct', 'lsp', 'sp'));
    }

    public function getAddtoCart(Request $req, $id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getGioHang()
    {
        return view('page.giohang');
    }

    public function getDatHang()
    {
        if (Auth::check()) {
            return view('page.dathang');
        } else {
            return view('page.dangnhap');
        }
    }

    public function postDatHang(Request $req)
    {
        if (Auth::check()) {
            if (Session::has('cart')) {
                $cart = Session::get('cart');
                // dd($cart);
                $customer = new Customer;
                $customer->name = $req->name;
                $customer->gender = $req->gender;
                $customer->email = $req->email;
                $customer->address = $req->address;
                $customer->phone_number = $req->phone_number;
                $customer->note = $req->note;
                $customer->save();

                $bill = new Bill;
                $bill->id_customer = $customer->id;
                $bill->date_order = date('Y-m-d');
                $bill->total = $cart->totalPrice;
                $bill->payment = $req->payment;
                $bill->note = $req->note;
                $bill->save();

                foreach ($cart->items as $key => $value) {
                    $bill_detail = new BillDetail();
                    $bill_detail->id_bill = $bill->id;
                    $bill_detail->id_product = $key;
                    $bill_detail->quantity = $value['qty'];
                    $bill_detail->unit_price = ($value['price'] / $value['qty']);
                    $bill_detail->save();
                }
                Session::forget('cart');
                return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
            } else {
                return redirect()->back()->with('thongbao', 'Đặt hàng không thành công');
            }
        } else {
            return view('page.dangnhap');
        }
    }

    public function postPhanHoi(Request $req)
    {
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'bodyMessage' => $req->message
        ];
        Mail::send('page.gui_email', $data, function ($message) use ($req) {
            $message->from($req->email, 'Mẫu Liên Hệ Từ Khách Hàng ' . $req->name);
            $message->to('th966391@gmail.com', $req->name);
            $message->subject($req->subject);
        });
        return redirect()->back()->with('thongbao_lienhe', 'Cảm ơn đã gửi thông tin liên hệ với chúng tôi, chúng tôi sẽ phản hồi bạn sớm nhất');
    }

    public function getDangNhap()
    {
        if (Auth::check()) {
            return redirect()->route('trang-chu');
        } else {
            return view('page.dangnhap');
        }
    }

    public function getDangKy()
    {
        if (Auth::check()) {
            return redirect()->route('trang-chu');
        } else {
            return view('page.dangky');
        }
    }

    public function postDangKy(Request $req)
    {
        // dd("lalalal");
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'fullname' => 'required',
                'repassword' => 'required|same:password',
                'phone' => 'required|regex:/[0-9]{10}/',
                'address' => 'required'
            ],
            [
                'email.required' => 'vui lòng nhập email ,',
                'email.email' => 'không đúng định dạng email ,',
                'email.unique' => 'email đã có người sử dụng ,',
                'password.required' => 'vui lòng nhập mật khẩu ,',
                'repassword.same' => 'mật khẩu không giống nhau ,',
                'password.min' => 'mật khẩu ít nhất 6 ký tự ,',
                'phone.required' => 'vui lòng nhập số điện thoại ,',
                'phone.regex' => 'vui lòng nhập đúng dạng số điện thoại ,',
                'address.required' => 'vui lòng nhập địa chỉ'
            ]
        );
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->quyenhan = 1;
        $user->save();
        return redirect()->back()->with('thongbao_dangky', 'Đã tạo tài khoản thành công');
    }

    public function postDangNhap(Request $req)
    {

        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'vui lòng nhập email',
                'email.email' => 'không đúng định dạng email',
                'password.required' => 'vui lòng nhập mật khẩu',
                'password.min' => 'mật khẩu ít nhất 6 ký tự',
                'password.max' => 'mật khẩu không quá 20 ký tự'
            ]
        );
        $credentials = array(
            'email' => $req->email,
            'password' => $req->password
        );
        if (Auth::attempt($credentials)) {
            return redirect()->back()->with(['flag' => 'success', 'thongbao_dangnhap' => 'Đăng nhập thành công']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'thongbao_dangnhap' => 'Đăng nhập không thành công']);
        }
    }

    public function getDangXuat()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('trang-chu');
        } else {
            return redirect()->route('dangnhap');
        }
    }

    public function getTimKiem(Request $req)
    {
        // dd($req->key);
        $product = Product::where('name', 'like', '%' . $req->key . '%')
            ->orwhere('unit_price', $req->key)
            ->paginate(12);
        return view('page.timkiem', compact('product'));
    }

    public function getSuaThongTinCaNhan()
    {
        if (Auth::check()) {
            return view('page.suathongtincanhan');
        } else {
            return redirect()->route('dangnhap');
        }
    }

    public function postSuaThongTinCaNhan(Request $req)
    {

        if (Auth::check()) {
            $this->validate(
                $req,
                [
                    'full_name' => 'required',
                    'phone' => 'required|regex:/[0-9]{10}/',
                    'address' => 'required',
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
                    User::where('id', Auth::user()->id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'email' => $req->email,
                            'password' => $pass,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                } else {
                    User::where('id', Auth::user()->id)
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
                    User::where('id', Auth::user()->id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'password' => $pass,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                } else {
                    User::where('id', Auth::user()->id)
                        ->update([
                            'quyenhan' => $req->quyenhan,
                            'full_name' => $req->full_name,
                            'phone' => $req->phone,
                            'address' => $req->address

                        ]);
                }
            }
            return redirect()->back()->with('thongbao_suathongtin', 'Đã Lưu tài khoản thành công');
        } else {
            return view('page.dangnhap');
        }
    }
}
