<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    use HasFactory;
    protected $table = 'phong';

    public function tang()
    {
        # code...
            return $this->belongsTo('App\Models\tang', 'id_tang', 'id');
    }
}
