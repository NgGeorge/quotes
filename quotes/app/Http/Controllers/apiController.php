<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use View;

class apiController extends Controller
{
    public function search(Request $request)
    {
        $term = str_replace('|', ' ', $request->input('term'));
        $results = Models\Quote::where('quote', 'LIKE', '%'.$term.'%')
                                ->orWhere('author', 'LIKE', '%'.$term.'%')
                                ->get()
                                ->toJson();
        return $results;
    }

    public function getAd()
    {
        return View::make('ad')->render();
    }
}
