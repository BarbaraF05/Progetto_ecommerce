<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    /* rotta homepage */
    public function welcome() {
        return view('welcome');
    }
}
