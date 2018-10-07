<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', ['quotes' => Quote::all()]);
    }
}
