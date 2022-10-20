<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = ['name', 'display_name'];

    public function locations()
    {
        return $this->belongsToMany('App\Models\Location');
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
