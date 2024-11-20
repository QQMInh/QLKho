<?php

use App\Http\Controllers\KhoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/login", action: [KhoController::class,'Login']);
Route::post("/login", [KhoController::class,'LoginDone']);
Route::get("/khung", action: [KhoController::class,'Home']);
Route::get("/danhsachsp", action: [KhoController::class,'Home']);
Route::get("/xuat", action: [KhoController::class,'Xuatsp']);
Route::post('/tao-phieu-xuat', [KhoController::class, 'DoneXuat'])->name('phieuxuat.done');

Route::get("/hoadonxuat", action: [KhoController::class,'HoaDonXuatSp']);
Route::get("/fullhoadonxuat", action: [KhoController::class,'FullHoaDonXuatSp']);