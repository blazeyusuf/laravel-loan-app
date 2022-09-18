<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;


    public function Invests()
    {
        return $this->hasMany(Invest::class, 'bank_id');
    }


    public function Bwithdraws()
    {
        return $this->hasMany(Bwithdraws::class, 'bank_id');
    }



     public function Deposits()
    {
        return $this->hasMany(Deposit::class, 'bank_id');
    }

 public function Loans()
    {
        return $this->hasMany(Loan::class, 'bank_id');
    }



public function Emis()
    {
        return $this->hasMany(Emi::class, 'bank_id');
    }



}
