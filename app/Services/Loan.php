<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Loan
{
    /**
     * Get loan status.
     *
     * @param  string  $status
     * @return object $obj
     */
    public function status($status)
    {
        switch ($status) {
            case 'approved':
                $status = 'Approved';
                $class = 'light-success';
                break;
            case 'pending':
                $status = 'Pending';
                $class = 'light-warning';
                break;
            case 'rejected':
                $status = 'Rejected';
                $class = 'light-danger';
                break;
            default:
                $status = 'No Status';
                $class = 'light-secondary';
        }

        return (object)[
            'name'  => $status,
            'class' => $class
        ];
    }

    /**
     * Get loan type.
     *
     * @param  string  $type
     * @return object $obj
     */
    public function type($type)
    {
        switch ($type) {
            case 'days':
                $type = 'Days';
                break;
            case 'months':
                $type = 'Months';
                break;
            case 'year':
                $type = 'Year';
                break;
            default:
                $type = 'Unknown';
        }

        return (object)[
            'name'  => $type,
        ];
    }
}
