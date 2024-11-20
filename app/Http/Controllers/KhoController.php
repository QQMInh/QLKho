<?php

namespace App\Http\Controllers;
use App\Models\PhieuXuatModel;
use App\Models\ThietBiModel;
use App\Models\LoModel;
use App\Models\ThuKhoModel;
use Illuminate\Http\Request;

class KhoController extends Controller
{
    //
    public function Login(){

        return view('login');
     }


     public function LoginDone(Request $request) {
        $usename = $request->username;
        $password = $request->password;
        
    
        $user = ThuKhoModel::where('Tk', $usename)->first();
       
        if ($user && $user->Mk == $password) {
            // Lưu thông tin người dùng vào session
            session([
                'user_id' => $user->Id_ThuKho,
                'user_fullname' => $user->Ten,
                'phone' => $user->Sdt,
                


            ]); // Lưu ID của người dùng hoặc các thông tin cần thiết khác vào session
        //  return ($usename_);
        return view('components.danhsachsanpham', ['user' => $user]); // Truyền dữ liệu người dùng vào view
        } else {
            return response()->json(['success' => false, 'message' => 'Thông tin đăng nhập không đúng.']);
        }

        
    }
     public function Home(){

        $lo_ = LoModel::with('thietbis')->get();
        
       

        return view('components.danhsachsanpham', compact('lo_'));
     }
     
     public function Xuatsp(){
      $phong_ = PhieuXuatModel::with('phongs')->get();
      $nguoidung_ = PhieuXuatModel::with('nguoidungs')->get();
      $thietbi_ = LoModel::with('thietbis')->get();
        return view('components.xuat', compact("phong_","nguoidung_","thietbi_"));
     }
     public function DoneXuat(Request $request)
    {
      $validatedData = $request->validate([
         'loaiDoiTuong' => 'required',
         'doiTuong' => 'required',
         'ngayXuatKho' => 'required|date',
         'ngayTra' => 'required|date',
         'mucDich' => 'required',
         'listSP' => 'required|array|min:1',
     ]);
 
     // Tạo phiếu xuất
     $phieuXuat = PhieuXuatModel::create([
         'ID_ThuKho' => auth()->user()->id, // Giả sử dùng auth
         'NgayXuatKho' => $validatedData['ngayXuatKho'],
         'NgayTra' => $validatedData['ngayTra'],
         'MucDich' => $validatedData['mucDich'],
         'ID_NguoiDung' => $validatedData['loaiDoiTuong'] === 'Người Dùng' ? $validatedData['doiTuong'] : null,
         'ID_Phong' => $validatedData['loaiDoiTuong'] === 'Phòng Ban' ? $validatedData['doiTuong'] : null,
     ]);
 
     return redirect()->route('phieuxuat.done')->with('success', 'Phiếu xuất được tạo thành công!');
    }

     public function HoaDonXuatSp(){

        return view('components.hoadonxuat');
     }
     public function FullHoaDonXuatSp(){

        return view('components.fullhoadonxuat');
     }
 

}
