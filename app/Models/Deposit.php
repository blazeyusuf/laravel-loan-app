<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Deposit extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'bank_id',
        'admin_id',
        'stuff_id',
        'ac_num',
        'amount',
       
    ];



    public function Account()
    {
        return $this->belongsTo(Account::class);
    }



     public function Bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function Branch()
    {
        return $this->belongsTo(Branch::class);
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
