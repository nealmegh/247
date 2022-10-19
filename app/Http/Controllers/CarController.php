<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $cars = Car::all();
        return view('Backend.Car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('Backend.Car.create');
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
            'name' => 'required',
            'size' => 'required|integer',
            'luggage' => 'required|integer',
            'status' => 'required|boolean',
            'fair' => 'required|integer',
            'description' => 'required'

        ]);

        $car = new Car([
            'name' => $request->post('name'),
            'size' => $request->post('size'),
            'luggage' => $request->post('luggage'),
            'status' => $request->post('status'),
            'fair' => $request->post('fair'),
            'description' => $request->post('description')
        ]);


        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');
        $car->save();
        return redirect()->route('cars.cars')->with('message', 'Car Type Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($car)
    {
        $car = Car::find($car);
        return view('Backend.Car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($car)
    {
        $car = Car::find($car);
        return view('Backend.Car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $car)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required|integer',
            'luggage' => 'required|integer',
            'status' => 'required|boolean',
            'fair' => 'required|integer',

        ]);

        $car = Car::find($car);
            $car->name = $request->post('name');
            $car->size = $request->post('size');
            $car->luggage = $request->post('luggage');
            $car->status = $request->post('status');
            $car->fair = $request->post('fair');
            $car->description = $request->post('description');

        $car->save();


        $request->session()->flash('alert-class', 'alert-success');

        return redirect()->route('cars.cars')->with('message', 'Car Type Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|int
     */
    public function destroy(Request $request, $car)
    {
        $car = Car::find($car);
        $car->delete();

//        $request->session()->flash('alert-class', 'alert-danger');

//        return redirect()->route('cars')->with('message', 'Car Type Deleted');
        return 200;

    }
}
