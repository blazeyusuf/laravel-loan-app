<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use App\Models\Loan;
Use App\Models\Account;
Use App\Models\Bank;
Use App\Models\Emi;
use Auth;


class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();
        return view('Loan.index', ['loans' => $loans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Loan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

      
            $bank = Bank::find($request->input(key: 'bank_id'));
            if (!$bank) {
                return back()->withErrors(['bank' => 'Account not found']);
            }

           
            $account_id = $request->input(key: 'account_id');

            $loanAmount = $request->input(key: 'amount');

            $loantype = $request->input(key: 'type');
            $loaninterest = $request->input(key: 'interest');
            $loannumber = $request->input(key: 'number');
            $loanEmi_amount = $request->input(key: 'Emi_amount');

            $loanac_num = $request->input(key: 'ac_num');

            $loanpayable = $request->input(key: 'payable');
              $admin_id = isset(Auth::guard('admin')->user()->id);

      

            // Create Loan
            Loan::create([
                'account_id' => $account_id,
                'amount'     => $loanAmount,
                'bank_id'    => $bank->id,
                'type'       => $loantype,
                'interest'   => $loaninterest,
                'number'     => $loannumber,
                'Emi_amount' => $loanEmi_amount,
                'ac_num'     => $loanac_num,
                'payable'    => $loanpayable,
                'admin_id'   => $admin_id,


            ]);



            // Update Main balance
            $bank->balance = $bank->balance - $loanAmount;


            $bank->save();

            return redirect()->back()->with('success','You have successfully issued new Loan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::find($id);
       
        return view('Loan.show')->with('loan', $loan);
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
