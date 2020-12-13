<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

use App\Models\tang;
use App\Models\phong;
class PageController extends Controller
{
    //
        function __construct()
    {
        # code...
        $tang = tang::all();
        $phong = phong::all();

        // return view('layout_page.master_view', ['tang' => $tang, 'phong' => $phong]);
        View::share(['tang' => $tang]);
        View::share(['phong' => $phong]);
    }
    function index()
    {
        # code...
        return view('layout_page.master_view');
    }
}
