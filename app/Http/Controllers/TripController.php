<?php

namespace App\Http\Controllers;

use App\Exports\VehicleExport;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\DriverExport;
use Maatwebsite\Excel\Facades\Excel;


class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $trips = Trip::all();
//        dd($trips[139]);
        return view('Backend.Trip.index')->with(compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit($trip)
    {
//
//    $response = '';
////    $response .= '<div class="modal-dialog" role="document">';
////    $response .=       '<div class="modal-content">';
////    $response .=    '<div class="modal-header">';
////    $response .=       '<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>';
////    $response .=         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
////    $response .=             '<span aria-hidden="true">&times;</span>';
////    $response .=        '</button>';
////    $response .=      '</div>';
//    $response .=      '<form method="post" action="#">';
//    $response .=            '{{ csrf_field() }}';
////    $response .=          '<div class="modal-body">';
////    $response .=            '...';
////    $response .=          '</div>';
//    $response .=           '<div class="modal-footer">';
//    $response .=              '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
//    $response .=                  '<button type="submit" class="btn btn-primary">Save changes</button>';
//    $response .=               '</div>';
//    $response .=       '</form>';
////    $response .=    '</div>';
////    $response .= '</div>';
////
//            echo $response;
//            exit;
////
////        $trip = Trip::find($trip)->first();
////        // dd($property);
////        return view('Backend.Trip.tripComplete', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $trip)
    {
            try{
                $trip = Trip::where('id', $trip)->first();
                $trip->trip_status = 1;
                $trip->collection_by_driver = $request->collection_by_driver;
                $trip->save();
            }
            catch (Exception $exception){
                
            }
        return redirect()->back()->with('message', 'Trip Ended Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
//    public function destroy(Trip $trip)
//    {
//        //
//    }
    public function driverReport()
    {
        return Excel::download(new DriverExport, 'drivers.csv');
    }

    public function driverReportDays(Request $request)
    {
        return (new DriverExport($request))->download('drivers.csv');
    }
    public function vehicleReportDays(Request $request)
    {
        return (new VehicleExport($request))->download('vehicles.csv');
    }

    public function earnings($id)
    {
        $trip = Trip::find($id);
        return $trip->trip_earnings;
//        return response()->json(['earnings' => $trip->trip_earnings]) ;
    }
}
