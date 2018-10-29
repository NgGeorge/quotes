<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function search(Request $request)
    {
        $term = str_replace('|', ' ', $request->input('term'));
        /*
        $results = App\Quote::where('quote', 'LIKE', '%'.$term.'%')
                                ->orWhere('author', 'LIKE', '%'.$term.'%")
                                ->get()
                                ->toJson();
                                */
        $results = json_encode({'success':1});
        return $results;
    }
}
