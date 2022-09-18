<?php

namespace App\Actions\Loan;

class UpdateLoan
{
    /**
     * Create a new invoice record in storage.
     *
     * @param object  $loan
     * @param array  $request
     * @return \Illuminate\Http\Response
     */
    public function handle(object $loan, array $request)
    {
        return $loan->update([
            'loan_amount'   => \App\Models\Loan::removeComma($request['loan_amount']),
            'duration'      => $request['duration'],
            'loan_type'     => $request['loan_type'],
        ]);
    }
}
