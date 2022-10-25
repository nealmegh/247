<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'book_by',
        'driver_id',
        'location_id',
        'airport_id',
        'car_id',
        'from_to',
        'return',
        'journey_date',
        'return_date',
        'pickup_address',
        'dropoff_address',
        'return_pickup_address',
        'return_dropoff_address',
        'flight_number',
        'meet',
        'adult',
        'child',
        'luggage',
        'carryon',
        'price',
        'add_info',
        'pickup_time',
        'return_time',
        'flight_origin',
        'discount_type',
        'discount_value',
        'discount_amount',
        'final_price',
        'return_flight_origin',
        'return_flight_number',
        'ref_id',
        'extra_price',
        'custom_price'
        ];

    protected $dates = ['journey_date', 'return_date'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }
    public function airport()
    {
        return $this->belongsTo('App\Models\Airport');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
    public function userTransaction()
    {
        return $this->hasOne('App\Models\UserTransaction');
    }

    public function invoice()
    {
        return $this->hasMany('App\Models\Invoice');
    }
    public function trips()
    {
        return $this->hasMany('App\Models\Trip');
    }
    public function from()
    {
        if($this->from_to == 'loc')
        {
        return $this->location->display_name;
        }
        else
        {
            return $this->airport->display_name;
        }
    }
    public function to()
    {
        if($this->from_to == 'loc')
        {
            return $this->airport->display_name;
        }
        else
        {
            return $this->location->display_name;
        }
    }
}
