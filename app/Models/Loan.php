<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\GenerateUUID;
use App\Services\Loan as LoanService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use SoftDeletes, GenerateUUID, HasFactory;

    const STATUS = [
        'Approved'  => 'approved',
        'Pending'   => 'pending',
        'Rejected'  => 'rejected',
    ];

    const TYPE = [
        'days'      => 'days',
        'months'    => 'months',
        'year'      => 'year',
    ];

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     * Set default user_id when a new loan is to be created.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($loan) {
            // Register the user_id of the authenticated user who requested a loan.
            $loan->user_id = auth()->id() ?? 1;
        });
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('uuid', $value)->firstOrFail();
    }

    /**
     * Path to view loan information.
     */
    public function path()
    {
        if (auth()->check() && (auth()->user()->role->url === 'administrator')) {
            return '/administrator/loans/' . $this->uuid;
        }

        return '/client/loans/' . $this->uuid;
    }

    /**
     * Format the loan amount and append currency symbol.
     */
    public function amount()
    {
        return '₦' . number_format($this->loan_amount);
    }

    /**
     * Remove comma from number format without removing decimal point.
     */
    public static function removeComma($value)
    {
        return floatval(preg_replace('/[^\d.]/', '', $value));
    }

    /**
     * Get the status of a single loan record created.
     */
    public function status()
    {
        return (new LoanService)->status($this->status);
    }

    /**
     * Get the type of a single loan record created.
     */
    public function type()
    {
        return (new LoanService)->type($this->loan_type);
    }

    /**
     * Get the date the loan was created.
     */
    public function dateCreated()
    {
        return Carbon::parse($this->created_at, 'UTC')->isoFormat('MMMM Do YYYY');
    }

    /**
     * Get the date the loan was approved.
     */
    public function dateApproved()
    {
        return !empty($this->approved_at) ? Carbon::parse($this->approved_at, 'UTC')->isoFormat('MMMM Do YYYY') : '-';
    }

    /**
     * Get the user who created the loan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who approved the loan.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }
}
