<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filemanagerController extends Controller
{
    public function file_view()
    {
        return view('file');
    }
}
