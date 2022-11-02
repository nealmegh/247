<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'private_hire_license',
        'vehicle_make', 'vehicle_license', 'vehicle_reg', 'commission', 'name', 'user_id',
        'dlva_eccc',
        'coc_image',
        'insurance_date',
        'insurance_image',
        'logbook_image',
        'private_hire_vehicle_license_image',
        'private_hire_vehicle_license_date',
        'private_hire_license_image',
        'private_hire_license_date',
        'bank_statement_image',
        'driving_license_image',
        'driving_license_date',
        'driving_license',
        ];

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
