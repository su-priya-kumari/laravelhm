<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addAdmin()
    {
        return view('admin.add_admin');
    }
}
