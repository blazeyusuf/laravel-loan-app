<?php

namespace App\Actions\Loan;

use App\Models\Loan;

class CreateLoan
{
    /**
     * Create a new invoice record in storage.
     *
     * @param array  $request
     * @return \Illuminate\Http\Response
     */
    public function handle(array $request)
    {
        return Loan::create([
            'loan_amount'   => Loan::removeComma($request['loan_amount']),
            'duration'      => $request['duration'],
            'loan_type'     => $request['loan_type'],
        ]);
    }
}
