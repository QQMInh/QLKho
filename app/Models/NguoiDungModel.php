<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDungModel extends Model
{
    use HasFactory;
    protected $fillable = ["Ten","Sdt"];
    protected $guarded = ['MaNguoiDung'];
    protected $table = 'nguoidung';
   
}