<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Invoice;
use App\Models\Driver;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $drivers = Driver::all();
        $driverInvoices = null ;
        $invoices = array();
        if(!isset($_GET['driver_id']))
        {
            return view('Backend.Invoice.index', compact('drivers'));
        }

            if($_GET['start_date'] != "" && $_GET['end_date'] != "")
            {
                $invoices = Invoice::where('status', '=', 0)->whereDate('created_at', '>', $_GET['start_date'])->whereDate('created_at', '<', $_GET['end_date'])->get();

            }
            elseif ($_GET['start_date'] == "" && $_GET['end_date'] != "")
            {
                $invoices = Invoice::where('status', '=', 0)->whereDate('created_at', '<', $_GET['end_date'])->get();
            }
            elseif ($_GET['start_date'] != "" && $_GET['end_date'] == "")
            {
                $invoices = Invoice::where('status', '=', 0)->whereDate('created_at', '>', $_GET['start_date'])->get();
//                dd($_GET['start_date'],$invoices);
            }
            else
            {
                $invoices = Invoice::where('status', '=', 0)->get();
            }

        foreach ($invoices as $invoice)
            {
               if($invoice->trip->driver_id == $_GET['driver_id'])
               {
                   $driverInvoices [] = $invoice;
               }

            }

        return view('Backend.Invoice.invoice', compact('driverInvoices'));

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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $invoice = Invoice::find($request->invoice_id[0]);
//        dd($invoice->booking->userTransaction->trans_id);
        $driver = $invoice->trip->driver;
        $total_trip = count($request->invoice_id);
        $total_bill = 0;
        $total_commission = 0;
        $total_payable = 0;
        $driver_collected = 0;
        $bill = new Bill();


        $bill->total_bill = $total_bill;
        $bill->total_commission = $total_commission;
        $bill->total_payable = $total_payable;
        $bill->status = 0;
        $bill->save();
        foreach ($request->invoice_id as $invoiceID)
        {
            $invoice = Invoice::find($invoiceID);
            $total_bill += $invoice->total_amount;
            if($invoice->booking->userTransaction->trans_id == 'Third Party')
            {
                $total_commission += 0;
            }
            elseif($invoice->booking->userTransaction->trans_id == 'Pay In Car')
            {
                $total_commission += ($invoice->total_amount*$invoice->trip->driver->commission)/100;
                $driver_collected += $invoice->total_amount;
            }
            else
            {
                $total_commission += ($invoice->total_amount*$invoice->trip->driver->commission)/100;
            }
            $invoice->bill_id = $bill->id;
            $invoice->status = 1;
            $invoice->save();
        }


        $bill->total_bill = round($total_bill, 2);
        $bill->total_commission = round($total_commission, 2);
        $bill->total_payable = round(($total_bill-$total_commission) - $driver_collected, 2);
        $bill->save();


        return redirect()->route('bill.show', ['id' => $bill->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
