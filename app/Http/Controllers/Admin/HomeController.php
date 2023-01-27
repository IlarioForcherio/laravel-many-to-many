<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   //questa function e' stata copiata da app/Http/Controllers/HomeController , che al momento e' stato cancellato

        return view('admin.home');
    }
}
