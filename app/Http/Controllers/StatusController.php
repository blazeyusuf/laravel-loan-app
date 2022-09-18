<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    function status($id)
{
	//get product status with the help of product ID
	$account = DB::table('accounts')
				->select('status')
				->where('id','=',$id)
				->first();

	//Check user status
	if($account->status == '1'){
		$status = '0';
	}else{
		$status = '1';
	}

	//update product status
	$values = array('status' => $status );
	DB::table('accounts')->where('id',$id)->update($values);

	
	return redirect()->back()->with('success','You have successfully Change the status.');
}
}
