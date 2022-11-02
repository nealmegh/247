<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Driver;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('Backend.Driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function dashboard(){
        $user = Auth::user();
        $driver = Driver::where('user_id', $user->id)->first();
        $trips = Trip::where('driver_id', $driver->id)->get();
//        dd($driver);
        return view('Backend.Driver.Dashboard.index', compact('trips'));
    }
    public function create()
    {
        return view('Backend.Driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'private_hire_license' => ['required'],
            'vehicle_make' => ['required'],
            'vehicle_license' => ['required'],
            'email' => ['required', 'email', 'unique:drivers'],
            'phone_number' => ['required'],
            'vehicle_reg' => ['required'],
            'commission' => ['required']
        ]);

        $driverName = $request->first_name.' '.$request->last_name;
        $request->request->add(['name' => $driverName]);
        if(User::where('email', '=', $request->email)->exists())
        {
            $user = User::where('email', '=', $request->email)->first();
            $request->request->add(['user_id' => $user->id]);
        }
        else
        {
            $password = 'Drive247Trips';
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $password;
            $data['password_confirmation'] = $password;
            $data['role_id'] = 5;
            $data['phone_full'] = $request->phone_number;

            try{
                $createUser = New CreateNewUser();
                $user = $createUser->create($data);
                $request->request->add(['user_id' => $user->id]);
            }
            catch (Exception $exception)
            {

            }
        }

        $request->merge([
            'insurance_date' => $this->setExpiryDates($request->post('insurance_date')),
            'private_hire_vehicle_license_date' => $this->setExpiryDates($request->post('private_hire_vehicle_license_date')),
            'private_hire_license_date' => $this->setExpiryDates($request->post('private_hire_license_date')),
            'driving_license_date' => $this->setExpiryDates($request->post('driving_license_date')),
        ]);

        $driver = Driver::create($request->all());
        $this->driverImagesUpload($request, $driver);

        return redirect()->route('driver.drivers')->with('message', 'Driver Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Driver $driver)
    {
        return view('Backend.Driver.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('Backend.Driver.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'private_hire_license' => ['required'],
            'vehicle_make' => ['required'],
            'vehicle_license' => ['required'],
            'email' => 'required|unique:drivers,email,'.$id,
            'phone_number' => ['required'],
            'vehicle_reg' => ['required'],
            'commission' => ['required']
        ]);

        $driverName = $request->first_name.' '.$request->last_name;
        $request->request->add(['name' => $driverName]);
        if($request->user_id != 'NA')
        {
            if(User::where('email', '=', $request->email)->exists())
            {
                $user = User::where('email', '=', $request->email)->first();
                if($user->role_id != 5)
                {
                    return redirect()->back()->with('message', 'Email Address Already in Use with other user type');
                }
            }
            $oldUser = User::find($request->user_id);
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['role_id'] = 5;
            $data['phone_full'] = $request->phone_number;

            try {
                $updateUser = new UpdateUserProfileInformation();
                $user = $updateUser->update($oldUser, $data);
            } catch (Exception $exception) {

            }

        }
        else{
            if(User::where('email', '=', $request->email)->exists())
            {
                $user = User::where('email', '=', $request->email)->first();
                $request->user_id = $user->id;
            }
            else
            {
                $password = '123456';
                $data['name'] = $request->name;
                $data['email'] = $request->email;
                $data['password'] = $password;
                $data['password_confirmation'] = $password;
                $data['role_id'] = 5;
                $data['phone_full'] = $request->phone_number;

                try{
                    $createUser = New CreateNewUser();
                    $user = $createUser->create($data);
                    $request->user_id = $user->id;
                }
                catch (Exception $exception)
                {

                }

            }
        }
        $driver = Driver::find($id);

        $driver->first_name = $request->post('first_name');
        $driver->last_name = $request->post('last_name');
        $driver->private_hire_license = $request->post('private_hire_license');
        $driver->vehicle_make = $request->post('vehicle_make');
        $driver->vehicle_license = $request->post('vehicle_license');
        $driver->name = $request->post('name');
        $driver->email = $request->post('email');
        $driver->phone_number = $request->post('phone_number');
        $driver->vehicle_reg = $request->post('vehicle_reg');
        $driver->commission = $request->post('commission');
        $driver->dlva_eccc = $request->post('dlva_eccc');
        $driver->insurance_date = $this->setExpiryDates($request->post('insurance_date'));
        $driver->private_hire_vehicle_license_date = $this->setExpiryDates($request->post('private_hire_vehicle_license_date'));
        $driver->private_hire_license_date = $this->setExpiryDates($request->post('private_hire_license_date'));
        $driver->driving_license_date = $this->setExpiryDates($request->post('driving_license_date'));
        $driver->driving_license = $request->post('driving_license');
        $driver->save();
        $this->driverImagesUpload($request, $driver);

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');

        return redirect()->route('driver.drivers')->with('message', 'Driver Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return string
     */
    public function setExpiryDates($date)
    {
        $datetime = new Carbon($date);
        return $datetime->format('Y-m-d');

    }
    public function driverImagesUpload(Request $request, Driver $driver)
    {
        $driverImagePath = "images/driver/$driver?->id";
        if($request->private_hire_license_image)
        {
            $privateHireLicenseImage = Str::after($request->private_hire_license_image, 'temp/');
            Storage::disk('public')->move($request->private_hire_license_image, "$driverImagePath/$privateHireLicenseImage");
            $driver->private_hire_license_image = "$driverImagePath/$privateHireLicenseImage";
            $driver->save();
        }
        if($request->driving_license_image)
        {
            $drivingLicenseImage = Str::after($request->driving_license_image, 'temp/');
            Storage::disk('public')->move($request->driving_license_image, "$driverImagePath/$drivingLicenseImage");
            $driver->driving_license_image = "$driverImagePath/$drivingLicenseImage";
            $driver->save();
        }
        if($request->bank_statement_image)
        {
            $bankStatementImage = Str::after($request->bank_statement_image, 'temp/');
            Storage::disk('public')->move($request->bank_statement_image, "$driverImagePath/$bankStatementImage");
            $driver->bank_statement_image = "$driverImagePath/$bankStatementImage";
            $driver->save();
        }
        if($request->insurance_image)
        {
            $insuranceImage = Str::after($request->insurance_image, 'temp/');
            Storage::disk('public')->move($request->insurance_image, "$driverImagePath/$insuranceImage");
            $driver->insurance_image = "$driverImagePath/$insuranceImage";
            $driver->save();
        }
        if($request->logbook_image)
        {
            $logbookImage = Str::after($request->logbook_image, 'temp/');
            Storage::disk('public')->move($request->logbook_image, "$driverImagePath/$logbookImage");
            $driver->logbook_image = "$driverImagePath/$logbookImage";
            $driver->save();
        }
        if($request->coc_image)
        {
            $cocImage = Str::after($request->coc_image, 'temp/');
            Storage::disk('public')->move($request->coc_image, "$driverImagePath/$cocImage");
            $driver->coc_image = "$driverImagePath/$cocImage";
            $driver->save();
        }
        if($request->private_hire_vehicle_license_image)
        {
            $phvlImage = Str::after($request->private_hire_vehicle_license_image, 'temp/');
            Storage::disk('public')->move($request->private_hire_vehicle_license_image, "$driverImagePath/$phvlImage");
            $driver->private_hire_vehicle_license_image = "$driverImagePath/$phvlImage";
            $driver->save();
        }

//        'coc_image',
//        'insurance_image',
//        'logbook_image',
//        'private_hire_vehicle_license_image',
//        'private_hire_license_image',
//        'bank_statement_image',
//        'driving_license_image',

    }
    public function destroy(Request $request, $driver)
    {
        $driver = Driver::find($driver);
        $driver->delete();

        $request->session()->flash('alert-class', 'alert-danger');

        return redirect()->route('driver.drivers')->with('message', 'Driver Deleted');

    }
    public function user_create()
    {
        $drivers = Driver::all();

        foreach($drivers as $key =>$driver){
            if($driver->user_id == NULL)
            {
                if(User::where('email', '=', $driver->email)->exists())
                {
                    $driver->email = $key.'_'.$driver->email;
                }
                $password = '123456';
                $data['name'] = $driver->name;
                $data['email'] = $driver->email;
                $data['password'] = $password;
                $data['password_confirmation'] = $password;
                $data['role_id'] = 5;
                $data['phone_full'] = $driver->phone_number;

                try{
                    $createUser = New CreateNewUser();
                    $user = $createUser->create($data);
                    $driver->user_id = $user->id;
                    $driver->save();
                }
                catch (Exception $exception)
                {

                }
            }
        }
        return redirect()->route('driver.drivers')->with('message', 'Drivers User Profile Created');
    }

    public function upload(Request $request){
        if($request->private_hire_license_image)
        {
            return $request->file('private_hire_license_image')->store('temp','public');
        }
        if($request->driving_license_image)
        {
            return $request->file('driving_license_image')->store('temp','public');
        }
        if($request->bank_statement_image)
        {
            return $request->file('bank_statement_image')->store('temp','public');
        }
        if($request->insurance_image)
        {
            return $request->file('insurance_image')->store('temp','public');
        }
        if($request->logbook_image)
        {
            return $request->file('logbook_image')->store('temp','public');
        }
        if($request->coc_image)
        {
            return $request->file('coc_image')->store('temp','public');
        }
        if($request->private_hire_vehicle_license_image)
        {
            return $request->file('private_hire_vehicle_license_image')->store('temp','public');
        }
    }

}
