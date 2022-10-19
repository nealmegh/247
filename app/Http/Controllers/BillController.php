<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\BillToDriver;
use Illuminate\Support\Facades\Mail;

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

    public function show1($bill)
    {
        $bill = Bill::find($bill);
        return view('Backend.Bill.show1', compact('bill'));
    }

    public function generateBill($bill)
    {
//        dd('ih0');
        $bill = Bill::find($bill);
        $data = ['bill' => $bill];
////        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('Backend.Bill.show', $data);
////        $content = $pdf->download()->getOriginalContent();
        $pdf = PDF::loadView('Backend.Bill.show', $data);
        return $pdf->stream('document.pdf');
//
////        Storage::put('public/csv/'.$bill->id.'.pdf',$content) ;
//        return redirect()->route('bills');
////        return $pdf->download($bill->id.'.pdf');
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
        ini_set('max_execution_time', 1220);
        $currentDateTime = Carbon::now();
        $dueTime = Carbon::now()->addMonth();

        $bill = Bill::find($bill);
        $data = ['bill' => $bill, 'dueTime' => $dueTime];

        $pdf = PDF::loadView('Backend.Bill.show2', $data);

        return $pdf->download($bill->id.'.pdf');

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
