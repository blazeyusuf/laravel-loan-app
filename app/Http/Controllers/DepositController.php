<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\Deposit; 
Use App\Models\Account;
Use App\Models\Branch;
Use App\Models\Bank;
Use App\Models\Admin;
Use App\Models\Stuff;
use Auth;



class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $deposits = Deposit::all();

        return view('Deposit.index', ['deposits' => $deposits]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $accounts = Account::all();
        return view('Deposit.create')->withAccounts($accounts);
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
                return back()->withErrors(['bank' => 'Bank Account not found']);
            }

/*$branch = Branch::find($request->input(key: 'id'));
            
*/

            $depositAmount = $request->input(key: 'amount');
             $ac_num = $request->input(key: 'ac_num');

            
        

            $stuff_id = Auth::guard('stuff')->user()->id; 
      
            // Create Deposit
            Deposit::create([
                'account_id' => $account->id,
                'amount'     => $depositAmount,
                'ac_num'     => $ac_num,
                'stuff_id'   => $stuff_id,
                'bank_id'    => $bank->id
            ]);

            // Update account balance

            $account->balance = $account->balance + $depositAmount;

            $account->save();

            // Update Main balance
            $bank->balance = $bank->balance + $depositAmount;


            $bank->save();


            return redirect()->back()->with('success','You have successfully added new new deposit.');







    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //  $deposits = Deposit::find($id);
      //  return view('Deposit.show')->with('deposits', $deposits);
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
