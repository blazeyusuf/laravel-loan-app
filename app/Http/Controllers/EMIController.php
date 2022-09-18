<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emi;
use App\Models\loan;
use App\Models\Bank;
use Auth;

class EMIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emis = Emi::all();

        return view('Emi.index', ['emis' => $emis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    



    public function create()
    {
        //

        return view('EMI.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        $this->validate($request, [
            'loan_id'       => 'required',
            'amount'           => 'required'
        ]);

            // Create Post
            $emi = new Emi; 
            $emi->loan_id = $request->input('loan_id');
            $emi->amount = $request->input('amount');
            $emi->save();

        return redirect('/Loan')->with('success','You have successfully added new new deposit.');
*/


            $loan = Loan::find($request->input(key: 'loan_id'));
            if (!$loan) {
                return back()->withErrors(['loan' => 'Loan not found']);
            }

             $bank = Bank::find($request->input(key: 'bank_id'));
            if (!$bank) {
                return back()->withErrors(['bank' => 'Bank not found']);
            }


            $emiAmount = $request->input(key: 'amount');

            $interest = $request->input(key: 'interest');

            $ac_num = $request->input(key: 'ac_num');

           
            $stuff_id = Auth::guard('stuff')->user()->id;


      
            // Create Deposit
            Emi::create([
                'loan_id' => $loan->id,
                'bank_id'    => $bank->id,
                'amount'     => $emiAmount,
                'ac_num'     => $ac_num,
                
                'stuff_id'   => $stuff_id,
                'interest'    => $interest
            ]);


            // Update Main balance
            $bank->balance = $bank->balance + $emiAmount;


            $bank->save();



            // Decrease loan Payable balance
            $loan->payable = $loan->payable - $emiAmount;


            $loan->save();


            return redirect()->back()->with('success','You have successfully paid installmets.');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emi = Emi::find($id);
        return view('Emi.show')->with('emi', $emi);
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
