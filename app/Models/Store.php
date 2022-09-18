<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

	protected $fillable = [
        'baccount_id',
        'bank_id',
        'amount'
        
       
    ];   

    public function Baccount()
    {
        return $this->belongsTo(Baccount::class);
    } 
}
