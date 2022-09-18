<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Sreturn;
use App\Models\Image;

  

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $accounts = Account::all();

      return view('Account.index', ['accounts' => $accounts]);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Account.create');
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

        $this->validate($request, [
            'ac_num'         => 'required',
            'name'  => 'required',
            'father'         => 'nullable',
            'mother'  => 'nullable',
            'M_address'         => 'nullable',
            'p_address'  => 'nullable',
            'nid'         => 'nullable',
            'birth'  => 'nullable',
            'nationality'         => 'nullable',
            'dob'  => 'nullable',
            'etin'         => 'nullable',
            'profession'  => 'nullable',
            'education'         => 'nullable',
            'm_income'  => 'nullable',
            'marital'         => 'nullable',
            'phone'  => 'nullable',
            'email'         => 'nullable',
            'n_name'         => 'nullable',
            'relation'  => 'nullable',
            'n_father'         => 'nullable',
            'n_mother'  => 'nullable',
            'n_nationality'         => 'nullable',
            'n_nid'  => 'nullable'
        ]);

            // Create Account
            $account = new Account;
            $account->ac_num = $request->input('ac_num');
            $account->name = $request->input('name');
            $account->father = $request->input('father');
            $account->mother = $request->input('mother');
            $account->M_address = $request->input('M_address');
            $account->p_address = $request->input('p_address');

            $account->nid = $request->input('nid');

            $account->birth = $request->input('birth');

            $account->nationality = $request->input('nationality');
            $account->dob = $request->input('dob');

            $account->etin = $request->input('etin');

            $account->profession = $request->input('profession');
            $account->education = $request->input('education');
            $account->m_income = $request->input('m_income');
            $account->marital = $request->input('marital');
            $account->phone = $request->input('phone');
            $account->email = $request->input('email');
            $account->n_name = $request->input('n_name');
            $account->relation = $request->input('relation');
            $account->n_father = $request->input('n_father');
            $account->n_mother = $request->input('n_mother');
            $account->n_nationality = $request->input('n_nationality');
            $account->n_nid = $request->input('n_nid');
            $account->save();

        return redirect('/Account')->with('success','You have successfully added new Account.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $account = Account::find($id);
        
        return view('Account.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $account = Account::find($id);
        return view('Account.edit')->with('account', $account);
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

        $this->validate($request, [
            'ac_num'         => 'required',
            'name'  => 'required',
            'father'         => 'nullable',
            'mother'  => 'nullable',
            'M_address'         => 'nullable',
            'P_address'  => 'nullable',
            'nid'         => 'nullable',
            'birth'  => 'nullable',
            'nationality'         => 'nullable',
            'dob'  => 'nullable',
            'etin'         => 'nullable',
            'profession'  => 'nullable',
            'education'         => 'nullable',
            'm_income'  => 'nullable',
            'marital'         => 'nullable',
            'phone'  => 'nullable',
            'email'         => 'nullable',
            'n_name'         => 'nullable',
            'relation'  => 'nullable',
            'n_father'         => 'nullable',
            'n_mother'  => 'nullable',
            'n_nationality'         => 'nullable',
            'n_nid'  => 'nullable'
        ]);

            // Create Post
            $account = Account::find($id);
            $account->ac_num = $request->input('ac_num');
            $account->name = $request->input('name');
            $account->father = $request->input('father');
            $account->mother = $request->input('mother');
            $account->M_address = $request->input('M_address');
            $account->p_address = $request->input('p_address');

            $account->nid = $request->input('nid');

            $account->birth = $request->input('birth');

            $account->nationality = $request->input('nationality');
            $account->dob = $request->input('dob');

            $account->etin = $request->input('etin');

            $account->profession = $request->input('profession');
            $account->education = $request->input('education');
            $account->m_income = $request->input('m_income');
            $account->marital = $request->input('marital');
            $account->phone = $request->input('phone');
            $account->email = $request->input('email');
            $account->n_name = $request->input('n_name');
            $account->relation = $request->input('relation');
            $account->n_father = $request->input('n_father');
            $account->n_mother = $request->input('n_mother');
            $account->n_nationality = $request->input('n_nationality');
            $account->n_nid = $request->input('n_nid');
            $account->save();

        return redirect('/search')->with('success','You have successfully added new Account.');
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
