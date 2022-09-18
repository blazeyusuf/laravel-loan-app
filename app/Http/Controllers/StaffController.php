<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\staff;
use App\Models\Admin;
use App\Models\Loan;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Emi;
use App\Models\Fdeposit;
use App\Models\Installment;
use App\Models\Cost;
use App\Models\Bank;
use App\Models\Pension;
use App\Models\Invest;
use App\Models\Bwithdraw;
use App\Models\Baccount;
use carbon\carbon; 
use Auth;

class StaffController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $today = Emi::where('staff_id', '=', Auth::guard('staff')->user()->id)->whereDate('created_at', Carbon::today())->sum('amount');

        $deposit = Deposit::where('staff_id', '=', Auth::guard('staff')->user()->id)->whereDate('created_at', Carbon::today())->sum('amount');

        $installment = Installment::where('staff_id', '=', Auth::guard('staff')->user()->id)->whereDate('created_at', Carbon::today())->sum('amount');

        return view('staff.home')->withToday($today)->withDeposit($deposit)->withInstallment($installment);
    }


    



}
