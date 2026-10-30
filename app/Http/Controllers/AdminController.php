<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('admin.beranda');
    }
}
