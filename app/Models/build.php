<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class build extends Model
{
    use HasFactory;

    protected $table = 'build';

    public function khachhang()
    {
        # code...
        return $this->belongsTo('App\Models\KhachHang', 'id_khachhang', 'id');
    }
    public function phong()
    {
        return $this->belongsTo('App\Models\phong', 'id_phong', 'id');

    }
}
