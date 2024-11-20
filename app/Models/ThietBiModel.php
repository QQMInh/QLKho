<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThietBiModel extends Model
{
    use HasFactory;
    protected $fillable = ["ID_Lo","TrangThai","DaXuatKho"];
    protected $guarded = ['ID_ThietBi'];
    protected $table = 'thietbi';
   
}
