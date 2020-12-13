<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tang;
use App\Models\phong;

class AjaxController extends Controller
{
    //
    public function getphong($idtang)
    {
        # code...
        $phong = phong::where([
            ['id_tang', $idtang],
            ['status', '0'],
            ])->get();

            foreach($phong as $value){
                echo "<option class='select-option' value='".$value->id."'>".$value->phong."</option>";
        }
    }
}
