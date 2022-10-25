<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'booking_id',
        'journey_type',
        'driver_id',
        'collection_by_driver',
        'collectable_by_driver',
        'trip_status',
        'journey_date',
        'booking_ref_id',
        'trip_ref_id',
        'trip_earnings'
    ];
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');
    }
    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice');
    }
}
