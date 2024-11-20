<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuKhoModel extends Model
{

    use HasFactory;
    protected $fillable = ["Ten","Sdt","Tk","Mk"];
    protected $guarded = ['Id_ThuKho'];
    protected $table = 'thukho';
   

}
