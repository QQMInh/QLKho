<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongModel extends Model
{
    use HasFactory;
    protected $fillable = ["TenPhong","ChucNangPhong","Mota"];
    protected $guarded = ['ID_Phong'];
    protected $table = 'phong';
   
}