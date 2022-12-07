<?php

namespace App\Http\Controllers;

use App\Mail\BookingComplete;
use App\Models\Bill;
//use Barryvdh\DomPDF\PDF;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\BillToDriver;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $bills = Bill::all();
//        $url = storage_path('csv/name.pdf');
//        $exists = Storage::disk('public')->exists('/csv/name.pdf');
//        dd($exists);
//        dd(public_path('/csv/4.pdf'));
        return view('Backend.Bill.bill', compact('bills'));
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
     * @param  \App\Bill  $bill
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($bill)
    {
        $bill = Bill::find($bill);
        $currentDateTime = Carbon::now();
        $dueTime = Carbon::now()->addMonth();
        return view('Backend.Bill.viewBill', compact('bill', 'dueTime'));
    }
    public function download($bill)
    {

    }
    public function show1($bill)
    {

        $bill = Bill::find($bill);
        $currentDateTime = Carbon::now();
        $dueTime = Carbon::now()->addMonth();


        $pdf = PDF::loadView('Backend.Bill.newDownload', compact('bill' , 'dueTime'));

       $pdf->download('247AE_Bill_'.$bill->id.'.pdf');

    }

    public function generateBill($bill)
    {
        $bill = Bill::find($bill);
        $currentDateTime = Carbon::now();
        $dueTime = Carbon::now()->addMonth();


        $pdf = PDF::loadView('Backend.Bill.newDownload', compact('bill' , 'dueTime'));

        return $pdf->download('247AE_Bill_'.$bill->id.'.pdf');
    }

     public function billCollect($bill)
    {
        $bill = Bill::find($bill);
        $bill->status = 1;
        $bill->save();
        return redirect()->route('bills');
    }

    /**
     * @param $bill
     */
    public function emailBill($bill)
    {
        try{
        $bill = Bill::find($bill);
        $fileName = 'invoice_'.$bill->id.'.pdf';

            $dueTime = Carbon::now()->addMonth();

            $pdf = PDF::loadView('Backend.Bill.newDownload', compact('bill' , 'dueTime'));

            Storage::put('public/invoices/driver/'.$fileName, $pdf->output());

            $driverUser = $bill->invoices[0]->booking->trips[0]->driver->user;
            $data = array(
                'user' => $driverUser
            );

            Mail::to($driverUser->email)->send(new BillToDriver($fileName, $data));
        }
        catch (\Exception $e){

        }


        return Redirect::back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
