<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $loanTypes = '';

        foreach (\App\Models\Loan::TYPE as $key => $value) {
            $loanTypes .= $value.',';
        }

        // Execute the validation if the request method is POST or PUT
        return [
            'loan_amount'   => 'bail|required|string',
            'duration'      => 'bail|required|numeric|min:1|max:30',
            'loan_type'     => 'bail|required|string|in:' . $loanTypes,
        ];
    }
}
