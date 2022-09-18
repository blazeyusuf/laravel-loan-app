<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;



    public function Costs()
    {
        return $this->hasMany(Cost::class, 'expense_id');
    }
}
