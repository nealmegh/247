<?php

namespace App\Http\Controllers;

//use App\payment;
use App\Booking;
use http\Url;
use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Config;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;

use PayPal\Api\PaymentExecution;
use Session;
use Redirect;



class PaymentController extends Controller
{

    public function __construct()
    {

    }

    public function payment()
    {
        return view ('payment');
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Booking ID:'.$request->booking_id.'.') /** item name **/
        ->setCurrency('GBP')
            ->setQuantity(1)
            ->setPrice($request->amount); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('GBP')
            ->setTotal($request->amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Taxi In Cambridge Booking ID:'.$request->booking_id.'.');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paymentStatus')) /** Specify return URL **/
        ->setCancelUrl(route('paymentStatus'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('booking_id', $request->booking_id);
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function paymentStatus(Request $request)
    {
        $value = $request->session()->get('paypal_payment_id');
        dd($request->session());
        echo 'hi '.$value ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment $payment)
    {
        //
    }



    public function createPaypalPayment(Request $request)
    {

        $booking = Booking::find($request->booking_id);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item1 = new Item();
        if($booking->from_to == 'loc')
        {
            $item1->setName('Booking ID:'.$booking->id.'.')
                ->setCurrency('GBP')
                ->setQuantity(1)
                ->setSku('Booking From '.$booking->location->display_name.' To '.$booking->airport->display_name ) // Similar to `item_number` in Classic API
                ->setPrice($booking->final_price);
        }
        else
        {
            $item1->setName('Booking ID:'.$booking->id.'.')
                ->setCurrency('GBP')
                ->setQuantity(1)
                ->setSku('Booking From '.$booking->airport->display_name.' To '.$booking->location->display_name ) // Similar to `item_number` in Classic API
                ->setPrice($booking->final_price);
        }


        $itemList = new ItemList();
        $itemList->setItems(array($item1));
        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($booking->final_price);
        $amount = new Amount();
        $amount->setCurrency("GBP")
            ->setTotal($booking->final_price)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment For Booking No: ".$booking->id)
            ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paymentStatus'))
            ->setCancelUrl(route('paymentStatus'));
        // Add NO SHIPPING OPTION
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);
        $webProfile = new WebProfile();
        $webProfile->setName($booking->user->name . uniqid())->setInputFields($inputFields);
        $webProfileId = $webProfile->create($this->_api_context)->getId();
        $payment = new Payment();
        $payment->setExperienceProfileId($webProfileId); // no shipping
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }
        return $payment;
    }

    public function executePaypalPayment(Request $request)
    {

        $paymentId = $_GET['paymentID'];

        $payment = Payment::get($paymentId, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['payerID']);
// dd('hi', $this->_api_context, $payment, $execution);
        try {

            $result = $payment->execute($execution, $this->_api_context);

        } catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode(); // Prints the Error Code
    echo $ex->getData(); // Prints the detailed error message
    die($ex);
} catch (Exception $ex) {
    die($ex);
}
        dd($result);
        return $result;
    }
}
