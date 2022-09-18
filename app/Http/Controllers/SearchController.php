<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;

class SearchController extends Controller
{
   

   public function create(Request $request)
   {
		return view('Search.create');
   
   }

public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $accounts = Account::query()
        ->where('ac_num', 'LIKE', '%'.$search. '%')
        ->orwhere('name', 'LIKE', '%'.$search. '%')
        ->get();
       

    // Return the search view with the resluts compacted
    return view('Search.create', ['accounts' => $accounts]);
}

}



