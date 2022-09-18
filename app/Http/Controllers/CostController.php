<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cost;
use App\Models\Expense;
use App\Models\Bank;


class CostController extends Controller
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
        $expenses = Expense::all();
        return view('Cost.create')->withExpenses($expenses);
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
            'type'       => 'required',
            'amount'     => 'required',
            'description'=> 'nullable'
        ]);

            // Create Post
            $cost = new Cost; 
            $cost->type = $request->input('type');
            $cost->amount = $request->input('amount');
            $cost->description = $request->input('description');
            $cost->save();


        */

    $bank = Bank::find($request->input(key: 'bank_id'));
            if (!$bank) {
                return back()->withErrors(['bank' => 'Account not found']);
            }

            $expense_id = $request->input(key: 'expense_id');

            $costAmount = $request->input(key: 'amount');

             $description = $request->input(key: 'description');
            
      
            // Create Deposit
            Cost::create([
                'bank_id'    => $bank->id, 
                'expense_id'     => $expense_id,
                'amount'=> $costAmount,
                'description'   => $description
            ]);

            

            // Update Main balance
            $bank->balance = $bank->balance - $costAmount;


            $bank->save();
        

        return redirect('/admin')->with('success','You have successfully added new new deposit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit(Cost $cost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cost $cost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cost $cost)
    {
        //
    }
}
