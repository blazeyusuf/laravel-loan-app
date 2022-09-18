<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Auth\Notifications\AdminResetPassword;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    


   
    /**
 * A user can have many messages
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function messages()
{
  return $this->hasMany(Message::class);
}


public function Emis()
    {
        return $this->hasMany(Emi::class, 'admin_id');
    }

public function Deposits()
    {
        return $this->hasMany(Deposit::class, 'admin_id');
    }

public function Loans()
    {
        return $this->hasMany(Loan::class, 'admin_id');
    }


public function Bwithdraws()
    {
        return $this->hasMany(Bwithdraw::class, 'admin_id');
    }



public function Pensions()
    {
        return $this->hasMany(Pension::class, 'admin_id');
    }


public function Fdeposits()
    {
        return $this->hasMany(Fdeposit::class, 'admin_id');
    }



    public function Repensions()
    {
        return $this->hasMany(Repension::class, 'admin_id');
    }



    public function Dbenefits()
    {
        return $this->hasMany(Dbenefit::class, 'admin_id');
    }



    public function Withdraws()
    {
        return $this->hasMany(Withdraw::class, 'admin_id');
    }



    public function Dewithdraws()
    {
        return $this->hasMany(Dewithdraw::class, 'admin_id');
    }


}
