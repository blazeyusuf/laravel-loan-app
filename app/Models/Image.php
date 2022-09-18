<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

   protected $table = "images";


   protected $fillable = [
    'profile',
    'signature',
    'account_id'
];

public function Account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }


}
