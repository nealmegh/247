<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        if(request()->user()->can('Customer')){
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended('customer/dashboard');
        }
        if(request()->user()->can('Driver')){
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended('drivers/dashboard');
        }
        if(request()->user()->can('Admin')){
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended('admin/dashboard');
        }
        if(request()->user()->cannot('Customer') && request()->user()->can('Driver')){
            return $request->wantsJson()
                ? response()->json(['two_factor' => false])
                : redirect()->intended('admin/dashboard');
        }

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(config('fortify.home'));
    }

}
