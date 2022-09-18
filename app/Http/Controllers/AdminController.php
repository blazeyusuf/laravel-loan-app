<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Admin;
use App\Models\Loan;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Installment;
use App\Models\Emi;
use App\Models\Fdeposit;
use App\Models\Cost;
use App\Models\Bank;
use App\Models\Pension;
use App\Models\Invest;
use App\Models\Bwithdraw;
use App\Models\Baccount;
use App\Models\Stuff;
use carbon\carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $emi = Emi::sum('amount');
        $bank = Bank::sum('balance');
        $account = Account::count('id');
        $loan = Loan::count('id');
        $ploan = Loan::where('payable', '>', 0)->count('id');
        $total = Loan::sum('amount');

        $acc = Account::orderBy('created_at','desc')->paginate(5);

        $loans = Loan::orderBy('created_at','desc')->paginate(5);

        $emis = Emi::whereDate('created_at', Carbon::today())->get();

        $dps = Pension::count('id');

        $invest = Invest::sum('amount');
        $bwithdraw = Bwithdraw::sum('amount');

        $reserve = Baccount::sum('balance');

    
;

        // NumberOfItems,Amount,(NumberOfItems*Amount) AS PayableAmount from DemoTable

    //$total = DB::table('emis')
           // ->select('amount, interest, sum(amount*interest)');

       

        $fd   = Fdeposit::sum('amount');
        $cost = Cost::sum('amount');
        $today = Emi::whereDate('created_at', Carbon::today())->sum('amount');
        $detoday = Deposit::whereDate('created_at', Carbon::today())->sum('amount');
        //installment
        $instoday = Installment::whereDate('created_at', Carbon::today())->sum('amount');

        $trloan = Loan::where('payable', '>', 0)->sum('amount');

        $rloan = Loan::where('payable', '>', 0)->sum('payable');

        return view('admin.home')->withEmi($emi)->withBank($bank)->withAccount($account)->withLoan($loan)->withTotal($total)->withFd($fd)->withCost($cost)->withToday($today)->withAcc($acc)->withLoans($loans)->withEmis($emis)->withPloan($ploan)->withDps($dps)->withInvest($invest)->withBwithdraw($bwithdraw)->withReserve($reserve)->withTrloan($trloan)->withRloan($rloan)->withDetoday($detoday)->withInstoday($instoday); 
    }


   



        public function stuff()
            {
   
                $stuffs = Stuff::all();

                return view('admin.stuff', ['stuffs' => $stuffs]);
            }



    

    

}
