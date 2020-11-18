<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/index', [
//     'as' => 'trang-chu',
//     'uses' => 'PageController@getIndex'
// ]);

Route::get(
    '/',
    [PageController::class, 'getIndex']
)->name('default');

Route::get(
    'index',
    [PageController::class, 'getIndex']
)->name('trang-chu');

Route::get(
    'loai-san-pham/{type}',
    [PageController::class, 'getLoaiSp']
)->name('loaisanpham');

Route::get(
    'chi-tiet-san-pham/{id}',
    [PageController::class, 'getChitiet']
)->name('chitietsanpham');

Route::get(
    'lien-he',
    [PageController::class, 'getLienHe']
)->name('lienhe');

Route::get(
    'gioi-thieu',
    [PageController::class, 'getGioiThieu']
)->name('gioithieu');

Route::get(
    'add-to-cart/{id}',
    [PageController::class, 'getAddtoCart']
)->name('themgiohang');

Route::get(
    'del-cart/{id}',
    [PageController::class, 'getDelItemCart']
)->name('xoagiohang');

Route::get(
    'gio-hang',
    [PageController::class, 'getGioHang']
)->name('giohang');

Route::get(
    'dat-hang',
    [PageController::class, 'getDatHang']
)->name('dathang');

Route::post(
    'dat-hang',
    [PageController::class, 'postDatHang']
)->name('dathang');

Route::post(
    'phan-hoi',
    [PageController::class, 'postPhanHoi']
)->name('phanhoi');

Route::get(
    'dang-nhap',
    [PageController::class, 'getDangNhap']
)->name('dangnhap');

Route::get(
    'dang-ky',
    [PageController::class, 'getDangKy']
)->name('dangky');

Route::post(
    'dang-ky',
    [PageController::class, 'postDangKy']
)->name('dangky');

Route::post(
    'dang-nhap',
    [PageController::class, 'postDangNhap']
)->name('dangnhap');

Route::get(
    'dang-xuat',
    [PageController::class, 'getDangXuat']
)->name('dangxuat');

Route::get(
    'tim-kiem',
    [PageController::class, 'getTimKiem']
)->name('timkiem');

Route::get(
    'sua-thongtincanhan',
    [PageController::class, 'getSuaThongTinCaNhan']
)->name('suathongtincanhan');

Route::post(
    'sua-thongtincanhan',
    [PageController::class, 'postSuaThongTinCaNhan']
)->name('suathongtincanhan');

///trang admin
///
///
///
///

Route::get(
    'trang-chu',
    [AdminController::class, 'getTrangChu']
)->name('trangchu');

Route::get(
    'ql-taikhoan',
    [AdminController::class, 'getTaiKhoan']
)->name('qltaikhoan');

Route::get(
    'them-taikhoan',
    [AdminController::class, 'getThemTaiKhoan']
)->name('themtaikhoan');

Route::post(
    'them-taikhoan',
    [AdminController::class, 'postThemTaiKhoan']
)->name('themtaikhoan');

Route::get(
    'xoa-taikhoan/{id}',
    [AdminController::class, 'getXoaTaiKhoan']
)->name('xoataikhoan');

Route::get(
    'sua-taikhoan/{id}',
    [AdminController::class, 'getSuaTaiKhoan']
)->name('suataikhoan');

Route::post(
    'sua-taikhoan/{id}',
    [AdminController::class, 'postSuaTaiKhoan']
)->name('suataikhoan');


Route::get(
    'ql-sanpham',
    [AdminController::class, 'getSanPham']
)->name('qlsanpham');

Route::get(
    'xoa-sanpham/{id}',
    [AdminController::class, 'getXoaSanPham']
)->name('xoasanpham');

Route::get(
    'them-sanpham',
    [AdminController::class, 'getThemSanPham']
)->name('themsanpham');

Route::post(
    'them-sanpham',
    [AdminController::class, 'postThemSanPham']
)->name('themsanpham');

Route::get(
    'sua-sanpham/{id}',
    [AdminController::class, 'getSuaSanPham']
)->name('suasanpham');

Route::post(
    'sua-sanpham/{id}',
    [AdminController::class, 'postSuaSanPham']
)->name('suasanpham');


Route::get(
    'ql-loaisanpham',
    [AdminController::class, 'getLoaiSanPham']
)->name('qlloaisanpham');

Route::get(
    'them-loaisanpham',
    [AdminController::class, 'getThemLoaiSanPham']
)->name('themloaisanpham');

Route::post(
    'them-loaisanpham',
    [AdminController::class, 'postThemLoaiSanPham']
)->name('themloaisanpham');

Route::get(
    'xoa-loaisanpham/{id}',
    [AdminController::class, 'getXoaLoaiSanPham']
)->name('xoaloaisanpham');

Route::get(
    'sua-loaisanpham/{id}',
    [AdminController::class, 'getSuaLoaiSanPham']
)->name('sualoaisanpham');

Route::post(
    'sua-loaisanpham/{id}',
    [AdminController::class, 'postSuaLoaiSanPham']
)->name('sualoaisanpham');

Route::get(
    'ql-slide',
    [AdminController::class, 'getSlide']
)->name('qlslide');

Route::get(
    'them-slide',
    [AdminController::class, 'getThemSlide']
)->name('themslide');

Route::post(
    'them-slide',
    [AdminController::class, 'postThemSlide']
)->name('themslide');

Route::get(
    'xoa-slide/{id}',
    [AdminController::class, 'getXoaSlide']
)->name('xoaslide');

Route::get(
    'sua-slide/{id}',
    [AdminController::class, 'getSuaSlide']
)->name('suaslide');

Route::post(
    'sua-slide/{id}',
    [AdminController::class, 'postSuaSlide']
)->name('suaslide');

Route::get(
    'ql-donhang',
    [AdminController::class, 'getDonHang']
)->name('qldonhang');

Route::get(
    'xoa-donhang/{id}',
    [AdminController::class, 'getXoaDonHang']
)->name('xoadonhang');

Route::get(
    'ql-chitietdonhang/{id}',
    [AdminController::class, 'getChiTietDonHang']
)->name('qlchitietdonhang');

Route::get(
    'xoa-chitietdonhang/{id}',
    [AdminController::class, 'getXoaChiTietDonHang']
)->name('xoachitietdonhang');
