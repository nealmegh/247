<?php

use App\Mail\CustomerReminder;
use App\Mail\DriverBlocked;
use App\Mail\DriverReminder;
use App\Models\Driver;
use App\Models\Trip;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Artisan::command('upload:cleanup', function () {
    $this->info('Cleaning up the temp upload folder');
        $files = Storage::disk('public')->listContents('temp');

        $numberOfFiles = collect($files)
            ->filter(function ($file){
              return $file['type'] === 'file' && $file['lastModified'] < now()->subDays(7)->getTimestamp();
            })->each(function ($file){
                Storage::disk('public')->delete($file['path']);
            })->count();
    $this->info($numberOfFiles." files have been deleted from server".now());
})->purpose('Clean up the temp upload folder');
Artisan::command('remind:trips', function () {
    $this->info('Reminder Email to Driver about Trips');
    $drivers = Driver::all();
    foreach ($drivers as $driver)
    {
        $trips = Trip::where('trip_status', '=', 0)->where('driver_id', '=', $driver->id)->get();
        $filteredTrips = collect($trips)->filter(function ($trip){
            return strtotime($trip['journey_date']) > now()->getTimestamp() && strtotime($trip['journey_date']) < now()->addDays(1)->getTimestamp();
        });
        if(count($filteredTrips) > 0)
        {
            Mail::to($driver->user->email)->send(new DriverReminder($filteredTrips));
        }
        $this->info(count($filteredTrips)." trips has been reminded to ".$driver->user->name.' '.now().' ');
    }


//        ->each(function ($trip){
//            dump( $trip['journey_date'], strtotime($trip['journey_date']), now()->addDays(3)->getTimestamp());
//        })->count();

})->purpose('Reminder Email to Driver about Trips');

Artisan::command('remind:customers', function () {
    $this->info('Reminder Email to Customer about Trips');

        $trips = Trip::where('trip_status', '=', 0)->get();
        $filteredTrips = collect($trips)->filter(function ($trip){
            return strtotime($trip['journey_date']) > now()->getTimestamp() && strtotime($trip['journey_date']) < now()->addDays(1)->getTimestamp();
        })->each(function ($trip){
            $data = array(
                'driver' => $trip->driver,
                'booking' => $trip->booking,
                'trip' => $trip,
                'user' => $trip->booking->user
            );
            Mail::to($trip->booking->user->email)->send(new CustomerReminder($data));
            $this->info(" trip has been reminded to ".$trip->booking->user->name.' '.now().' ');
        })->count();

        $this->info($filteredTrips." trips has been reminded to Customers ".now().' ');

})->purpose('Reminder Email to Customers about Trips');

Artisan::command('check:drivers', function () {
    $this->info('Check if Drivers has documents Upto Date');

    $drivers = Driver::all();
    foreach ($drivers as $driver)
    {
        $timeNow = now()->getTimestamp();
        if($timeNow > strtotime($driver['driving_license_date']) ){
            $driver->status = 0;
        }
        elseif($timeNow > strtotime($driver['driving_license_date']) ){
            $driver->status = 0;
        }
        elseif($timeNow > strtotime($driver['driving_license_date']) ){
            $driver->status = 0;
        }
        else{
            $driver->status = 1;
        }
        $driver->save();
        if($driver->status == 0)
        {
            Mail::to($driver->user->email)->send(new DriverBlocked());
            $this->info(" System has blocked Driver ".$driver->user->name.' '.now().' ');
        }
    }
    Log::info('checked');


})->purpose('Check Drivers Documents Validity');
