<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_full' => ['required']
        ])->validateWithBag('updateProfileInformation');
        if (empty($input['role_id'])){
            $input['role_id'] = 2;
        }
        if (empty($input['status'])){
            $input['status'] = 1;
        }

//        if (isset($input['photo'])) {
//            $user->updateProfilePhoto($input['photo']);
//        }

//        if ($input['email'] !== $user->email &&
//            $user instanceof MustVerifyEmail) {
//            $this->updateVerifiedUser($user, $input);
//        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone_full'],
                'role_id' => $input['role_id'],
                'status' => $input['status'],
            ])->save();
//        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customerUpdate($user, Request $request)
    {
//        dd($request);
        $user = $user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');

        return redirect()->back()->with('message', 'User Updated');
    }
}
