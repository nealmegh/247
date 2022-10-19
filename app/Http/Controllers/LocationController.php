<?php

namespace App\Http\Controllers;

use App\Models\Airport;

use Illuminate\Http\Request;
use App\Models\Location;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $locations = Location::all();
        return view('Backend.Location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $airports = Airport::all();
        return view('Backend.Location.create', compact('airports'));
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
            'name' => 'required|unique:airports,name',
            'display_name' => 'required',

        ]);
//        dd($request);

        $location = new Location([
            'name' => $request->post('name'),
            'display_name' => $request->post('display_name')
        ]);
        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');

        $location->save();
        $airports = Airport::all();
        $requestArray = $request->all();

        foreach ($airports as $airport)
        {

            if(array_key_exists('price'.$airport->id , $request->all()))
            {
                $location->airports()->attach($airport->id, ['price' => $requestArray['price'.$airport->id], 'return_price' => $requestArray['return_price'.$airport->id]]);
            }

        }
        return redirect()->route('location.locations')->with('message', 'Location Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     *
     */
    public function edit($id)
    {
        $location = Location::find($id);
        $airports = Airport::all();
        return view('Backend.Location.edit', compact('location', 'airports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:locations,name,'.$id,
            'display_name' => 'required'
        ]);
        $location = Location::find($id);

        $location->name = $request->post('name');
        $location->display_name = $request->post('display_name');

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        $location->save();

        $airports = Airport::all();
        $requestArray = $request->all();
        $location->airports()->detach();
        foreach ($airports as $airport)
        {

            if(array_key_exists('price'.$airport->id , $request->all()))
            {
                $location->airports()->attach($airport->id, ['price' => $requestArray['price'.$airport->id], 'return_price' => $requestArray['return_price'.$airport->id]]);
            }
//            if(array_key_exists('return_price'.$airport->id , $request->all()))
//            {
//                $location->airports()->attach($airport->id, ['return_price' => $requestArray['return_price'.$airport->id]]);
//            }
        }

        return redirect()->route('location.locations')->with('message', 'Location Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $location)
    {
        $location = Location::find($location);
        $location->airports()->detach();
        $location->delete();

        $request->session()->flash('alert-class', 'alert-danger');

        return redirect()->route('location.locations')->with('message', 'Location Deleted');
    }

    public function fairs()
    {
        $locations = Location::all();
        return view('Backend.Location.fairs', compact('locations'));
    }
}
