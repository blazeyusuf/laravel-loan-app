<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Actions\Loan\CreateLoan;
use App\Actions\Loan\UpdateLoan;
use App\Traits\RecursiveActions;
use App\Http\Requests\LoanRequest;
use App\Http\Controllers\Controller;

class LoanController extends Controller
{
    use RecursiveActions;

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
        return view('administrator.loans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LoanRequest  $request
     * @param  \App\Actions\Loan\CreateLoan  $createLoan
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request, CreateLoan $createLoan)
    {
        // Create loan record from user input and default parameters.
        return ($createLoan->handle($request->validated()))
            ? redirect()->route('administrator.home')->with('success', 'Loan was successfully requested.')
            : back()->with('error', 'Sorry! An error occured while trying to request loan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        return view('administrator.loans.edit', ['loan' => $loan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LoanRequest  $request
     * @param  \App\Actions\Loan\UpdateLoan  $updateLoan
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(LoanRequest $request, UpdateLoan $updateLoan,  Loan $loan)
    {
        // Update loan record from user input and default parameters.
        return ($updateLoan->handle($loan, $request->validated()))
            ? redirect()->route('administrator.home')->with('success', 'Loan request was successfully updated.')
            : back()->with('error', 'Sorry! An error occured while trying to update loan request.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        // Soft delete a loan record
        return ($this->updateEntityAccess($loan['uuid'], '\App\Models\Loan'))
            ? redirect()->back()->with('success', 'Loan record was permanently deleted.')
            : back()->with('error', 'Sorry! An error occured while trying to permanently delete loan record.');
    }

    /**
     * Approve/Reject the specified loan uuid
     *
     * @param  string  $status
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus($uuid, string $status)
    {
        // Check if the status in the URL parameter is valid
        if (strcmp($status, Loan::STATUS['Pending']) || strcmp($status, Loan::STATUS['Approved']) || strcmp($status, Loan::STATUS['Rejected'])) {
            // Update loan status
            $updated = Loan::where('uuid', $uuid)->firstOrFail()->update([
                'status' => $status,
                'approved_by' => auth()->id(),
                'approved_at' => now()
            ]);
        } else {
            return back()->with('error', 'Invalid loan status');
        }

        return ($updated)
            ? redirect()->back()->with('success', 'Loan status was updated successfully.')
            : back()->with('error', 'Sorry! An error occured while trying to update loan status.');
    }
}
