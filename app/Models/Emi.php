<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emi extends Model
{
    use HasFactory;

protected $fillable = [
        'loan_id',
        'bank_id',
        'amount',
        'ac_num',
        'stuff_id',
        'admin_id',
        'interest'
        
       
    ];



    public function Loan()
    {
        return $this->belongsTo(loan::class);
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    public function stuff()
    {
        return $this->belongsTo(Stuff::class);
    }
}
