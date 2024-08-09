<?php

namespace App\Http\Controllers;
use App\Models\information;

use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index() {
        return view('data');
    }

    public function show() {
        return view('data');
    }
}
