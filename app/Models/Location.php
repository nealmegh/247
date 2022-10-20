<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'display_name'];
    public function airports()
    {
        return $this->belongsToMany('App\Models\Airport')->withPivot( 'price', 'return_price');
    }
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
    public function quick_bookings()
    {
        return $this->hasMany('App\Models\QuickBooking');
    }

}
