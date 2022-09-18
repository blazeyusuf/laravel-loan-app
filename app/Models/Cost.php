<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

     protected $fillable = [
        'bank_id',
        'expense_id',
        'amount',
        'description'
       
    ];



    public function Expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
