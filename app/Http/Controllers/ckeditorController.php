<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ckeditorController extends Controller
{
    public function ck_view()
    {
        return view('CKeditorclone');
    }
}
