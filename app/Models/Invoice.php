<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    protected $fillable = [ 'booking_id',
        'booking_date',
        'pick_up',
        'drop_off',
        'driver_name',
        'driver_phone',
        'customer_name',
        'customer_phone',
        'customer_email',
        'payment_type',
        'status',
        'total_amount',
        'booking_from',
        'booking_to',
        'trip_id'
        ];

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');
    }

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

    public function trip()
    {
        return $this->belongsTo('App\Models\Trip');
    }
}
