<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuXuatModel extends Model
{
    use HasFactory;
    protected $fillable = ["ID_ThuKho","NgayXuatKho","NgayTra","MucDich","ID_NguoiDung","ID_Phong"];
    protected $guarded = ['ID_PhieuXuat'];
    protected $table = 'phieuxuat';

    public function phongs()
    {
        return $this->hasMany(PhongModel::class, 'ID_Phong', 'ID_Phong'); 
        
    }
    public function nguoidungs()
    {
        return $this->hasMany(NguoiDungModel::class, 'MaNguoiDung', 'ID_NguoiDung'); 
        
    }

   
}