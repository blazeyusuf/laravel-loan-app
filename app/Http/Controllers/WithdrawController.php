<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Withdraw;
use App\Models\Account; 
use App\Models\Bank;
use Auth; 

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = Withdraw::all(); 
        return view('Withdraw.index', ['withdraws' => $withdraws]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Withdraw.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request, [
            'account_id'       => 'required',
            'amount'           => 'required'
        ]);

            // Create Post
            $withdraw = new Withdraw; 
            $withdraw->account_id = $request->input('account_id');
            $withdraw->amount = $request->input('amount');
            $withdraw->save();


*/

            
            $account = Account::find($request->input(key: 'account_id'));
            if (!$account) {
                return back()->withErrors(['account' => 'Account not found']);
            }

            $bank = Bank::find($request->input(key: 'bank_id'));
            if (!$bank) {
                return back()->withErrors(['bank' => 'Account not found']);
            }

            $withdrawAmount = $request->input(key: 'amount');
            $ac_num = $request->input(key: 'ac_num');
            $admin_id = isset(Auth::guard('admin')->user()->id);

            // Create Deposit
            Withdraw::create([
                'account_id' => $account->id,
                'amount'     => $withdrawAmount,
                'ac_num'     => $ac_num,
                'bank_id'    => $bank->id,
                'admin_id'    => $admin_id
            ]);


            // Update account balance
            $account->balance = $account->balance - $withdrawAmount;
            $account->save();



            $bank->balance = $bank->balance - $withdrawAmount;
            $bank->save();




        return redirect()->back()->with('success','You have successfully withdraw from account.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $withdraw = Withdraw::find($id);
        return view('Withdraw.show')->with('withdraw', $withdraw);
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
