<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Stuff as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\StuffResetPasswordNotification;


class stuff extends Authenticatable
{
    use Notifiable;

    protected $guard = 'stuff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        $this->notify(new StuffResetPasswordNotification($token));
    }



    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'stuff_id');
    }


    public function emis()
    {
        return $this->hasMany(Emi::class, 'stuff_id');
    }


     public function installments()
    {
        return $this->hasMany(Installment::class, 'stuff_id');
    }


     public function Salaries()
    {
        return $this->hasMany(Salary::class, 'stuff_id');
    }

 
}