<?php
namespace App\Exports;

use App\Models\Driver;
use App\Models\Trip;
use Carbon\Carbon;


use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class VehicleExport implements FromQuery, WithHeadings
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
            'VRM',
            'Vehicle make',
            'Vehicle licence number',
        ];
    }
    public function query()
    {
        $driverID = [];
        $trips = Trip::select('driver_id')->where('trip_status', 1)->where('journey_date', '>', $this->request->from_date_vehicle)->where('journey_date', '<', $this->request->to_date_vehicle)->get();
        foreach ($trips as $trip)
        {
            if(!in_array ( $trip->driver_id, $driverID, true ))
            {
                $driverID [] = $trip->driver_id;
            }
        }
        $vehicles = Driver::query()->select('vehicle_reg', 'vehicle_make', 'vehicle_license')->whereIn('id', $driverID);

        return $vehicles;
    }
}
