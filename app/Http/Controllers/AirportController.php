<?php

namespace App\Http\Controllers;

use App\MOdels\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function index()
    {
        $airports = Airport::all();
        return view('Backend.Airport.index', compact('airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('Backend.Airport.create');
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

        $airport = new Airport([
            'name' => $request->post('name'),
            'display_name' => $request->post('display_name')
        ]);
        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        $airport->save();
        return redirect()->route('airport.airports')->with('message', 'Airport Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $airport = Airport::find($id);
        return view('Backend.Airport.edit', compact('airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:airports,name,'.$id,
            'display_name' => 'required'
        ]);
        $airport = Airport::find($id);

        $airport->name = $request->post('name');
        $airport->display_name = $request->post('display_name');

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        $airport->save();

        return redirect()->route('airport.airports')->with('message', 'Airport Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Request $request, $airport)
    {
        $airport = Airport::find($airport);
        $airport->locations()->detach();
        $airport->delete();

        $request->session()->flash('alert-class', 'alert-danger');

        return redirect()->route('airport.airports')->with('message', 'Airport Deleted');
    }
}
