<?php
namespace App\Exports;

use App\Models\Driver;
use App\Models\Trip;
use Carbon\Carbon;


use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class DriverExport implements FromQuery, WithHeadings
{
    use Exportable;
    public function __construct($request)
    {
        $this->request = $request;
        return $this;
    }
    public function headings(): array
    {
        return [
            'Private hire driver licence number',
            'Forename',
            'Surname',
        ];
    }
    public function query()
    {

        $driverID = [];
        $trips = Trip::select('driver_id')->where('trip_status', 1)->where('journey_date', '>', $this->request->from_date_driver)->where('journey_date', '<', $this->request->to_date_driver)->get();
        foreach ($trips as $trip)
        {
            if(!in_array ( $trip->driver_id, $driverID, true ))
            {
                $driverID [] = $trip->driver_id;
            }
        }
        $drivers = Driver::query()->select('private_hire_license', 'first_name', 'last_name')->whereIn('id', $driverID);
//dd($driverID);
        return $drivers;
    }
}
