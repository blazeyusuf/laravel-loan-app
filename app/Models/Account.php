<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable; 

class Account extends Model
{
    use HasFactory;


public function Deposits()
    {
        return $this->hasMany(Deposit::class, 'account_id');
    }

public function Loans()
    {
        return $this->hasMany(Loan::class, 'account_id');
    }

    
public function Withdraws()
    {
        return $this->hasMany(Withdraw::class, 'account_id');
    }


public function Dewithdraws()
    {
        return $this->hasMany(Dewithdraw::class, 'account_id');
    }


public function Fdeposits()
    {
        return $this->hasMany(Fdeposit::class, 'account_id');
    }


public function Dbenefits()
    {
        return $this->hasMany(Dbenefit::class, 'account_id');
    }


    public function Images()
    {
        return $this->hasMany(Image::class, 'account_id');
    }



    public function Pensions()
    {
        return $this->hasMany(Pension::class, 'account_id');
    }




    public function Repensions()
    {
        return $this->hasMany(Repension::class, 'account_id');
    }






public function Shares()
    {
        return $this->hasMany(Share::class, 'account_id');
    }




    public function Sreturns()
    {
        return $this->hasMany(Sreturn::class, 'account_id');
    }


    


    

    
}
