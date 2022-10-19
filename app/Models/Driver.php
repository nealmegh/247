<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'private_hire_license',
        'vehicle_make', 'vehicle_license', 'vehicle_reg', 'commission', 'name', 'user_id'];

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
    public function trips()
    {
        return $this->hasMany('App\Models\Trip');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
