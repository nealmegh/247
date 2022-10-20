<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_by',
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
        'price',
        'add_info',
        'pickup_time',
        'return_time',
        'custom_price'
    ];
    protected $dates = ['journey_date', 'return_date'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function airport()
    {
        return $this->belongsTo('App\Models\Airport');
    }
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
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
