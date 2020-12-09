<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tang extends Model
{
    use HasFactory;
    protected $table = 'tang';

    public function phong()
    {
        # code...
        return $this->hasMany('App\Models\phong', 'id_tang' , 'id');
    }
}
