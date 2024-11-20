<?php



namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoModel extends Model
{
    use HasFactory;
    protected $fillable = ["TenThietBi","DonViTinh","TyLeKhauHao","TieuHao", "ID_DanhMuc"];
    protected $guarded = ['ID_Lo'];
    protected $table = 'lo';
    public function thietbis()
    {
        return $this->hasMany(ThietBiModel::class, 'ID_Lo', 'ID_Lo'); 
        // 'ID_Lo' (khóa ngoại trong bảng `thietbi`)
        // 'ID_Lo' (khóa chính trong bảng `lo`)
    }
    
}
