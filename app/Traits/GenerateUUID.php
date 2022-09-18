<?php

namespace App\Traits;

trait GenerateUUID
{
    /**
     * Auto generate a UUID while creating a new record for any model instance.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid()->toString();
        });
    }
}
