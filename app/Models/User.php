<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * The accessors to append to the model's array form.
     *: \Illuminate\Database\Eloquent\Relations\HasMany
     * @var array
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
    public function quick_bookings()
    {
        return $this->hasMany('App\Models\QuickBooking');
    }
    public function breadCrumbs(){
        $router = Route::current()->action['prefix'];

        $routeNames = explode('/', $router);
        $breadCrumbs = [];
        foreach ($routeNames as $r)
        {
            $breadCrumbs[] = ucfirst($r);
        }
        unset($breadCrumbs[0]);

        return $breadCrumbs;

    }
    public function role($role_id)
    {

        if($role_id == 1)
        {
            return 'Admin';
        }
        if($role_id == 2)
        {
            return 'Customer';
        }
        if($role_id == 3)
        {
            return 'Manager';
        }
        if($role_id == 4)
        {
            return 'Agent';
        }
        if($role_id == 5)
        {
            return 'Driver';
        }

        return 'N/A';

    }
}
