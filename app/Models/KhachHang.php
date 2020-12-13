<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class KhachHang extends Model implements AuthenticatableContract
{
    use AuthenticableTrait;
    use HasFactory;
    protected $table = 'khachhang';


    protected $fillable = [
        'email', 'password', 'name', 'phone', 'Identity', 'status', 'bookingon', 'Count_booking', 'date_book', 'check_out', 'id_phong',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phong()
    {
        # code...
            return $this->belongsTo('App\Models\phong', 'id_phong', 'id');
    }
    public function build()
    {
        # code...
        return $this->hasMany('App\Models\build', 'id_khachhang', 'id');

    }
}
