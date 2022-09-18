<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'amount',
        'ac_num',
        'bank_id',
        'admin_id'

    ];



    public function Account()
    {
        return $this->belongsTo(Account::class);
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
