<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', ['quotes' => Models\Quote::all(), 'QOTD' => Models\Quote::inRandomOrder()->first()]);
    }
}
