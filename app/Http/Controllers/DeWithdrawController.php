<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dewithdraw;
use App\Models\Account; 
use App\Models\Bank;
use Auth;

class DeWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
            $account = Account::find($request->input(key: 'account_id'));
            if (!$account) {
                return back()->withErrors(['account' => 'Account not found']);
            }

            $bank = Bank::find($request->input(key: 'bank_id'));
            if (!$bank) {
                return back()->withErrors(['bank' => 'Bank not found']);
            }

            $dewithdrawAmount = $request->input(key: 'amount');
            $admin_id = isset(Auth::guard('admin')->user()->id);

            // Create Deposit
            Dewithdraw::create([
                'account_id' => $account->id,
                'bank_id'    => $bank->id,
                'amount'     => $dewithdrawAmount,
                'admin_id'   => $admin_id
            ]);


            // update bank balance

            $bank->balance = $bank->balance - $dewithdrawAmount;
            $bank->save();




        return redirect()->back()->with('success','You have successfully complette Deposit Withdraw.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
