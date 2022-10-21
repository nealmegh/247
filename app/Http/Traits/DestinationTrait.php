<?php
namespace App\Http\Traits;
use App\Actions\Fortify\CreateNewUser;
use App\Models\Car;
use App\Models\Location;
use App\Models\SiteSettings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait DestinationTrait {

    public function setDestination(Request $request){
            $price = 0;
            $returnPrice = 0;
            $to = $request->selectTo;
            $fromString = $request->selectFrom;
            if($request->selectFrom == 'other')
            {
                $request->request->add(['from_to' => 'other']);
                $request->request->add(['location_id' => 0]);
                $request->request->add(['airport_id' => 0]);
                $price = $request->custom_price;
                if($request->return == 1)
                {
                    $price = $request->custom_price/2;
                    $returnPrice = $request->custom_price/2;
                }
            }
            else{
                $maintain = mb_substr($fromString, 0, 3);
                $from = substr($fromString, 3);
                $request->request->add(['from_to' => $maintain]);
                if($maintain == 'loc')
                {
                    $location = Location::find($from);
                    $request->request->add(['location_id' => $from]);
                    $request->request->add(['airport_id' => $to]);
                    foreach ($location->airports as $airport)
                    {
                        if($airport->id == $to)
                        {
                            $price = round($airport->pivot->price,2);
                            $returnPrice = round($airport->pivot->return_price, 2);
                        }
                    }
                }
                else
                {
                    $location = Location::find($to);

                    $request->request->add(['airport_id' => $from]);
                    $request->request->add(['location_id' => $to]);
                    foreach ($location->airports as $airport)
                    {
                        if($airport->id == $from)
                        {
                            $price = round($airport->pivot->return_price, 2);
                            $returnPrice = round($airport->pivot->price,2);;
                        }
                    }
                }
            }

            return $this->priceSet($request, $price, $returnPrice);
    }
    private function priceSet(Request $request, $price, $returnPrice){
        $totalPrice = 0;
        $discount = 0;
        $finalPrice = 0;
        $meetPrice = 0;
        $siteSettings = SiteSettings::all();
        $meetValue = round(floatval($siteSettings[0]->value),2);
        $car = Car::find($request->car_id);
        $carPrice = round($car->fair, 2);
        if($car->fair == 500)
        {
            $carPrice = $price*.5;
        }
        if($request->return == 1)
        {
            $carPrice = $carPrice*2;
        }
        else
        {
            $returnPrice = 0;
        }
        if($request->meet == 1)
        {
            $meetPrice = $meetValue;
        }
        if($request->custom_price == 0)
        {
            $totalPrice = round($meetPrice + $price + $carPrice + $returnPrice,2);

            if($request->discount_value > 0)
            {
                if($request->discount_type == 0)
                {
                    $discount = $request->discount_value;
                }
                else
                {
                    $discount = $totalPrice*($request->discount_value/100);
                }
            }

            $finalPrice = round(($totalPrice - $discount) + $request->extra_price, 2);

        }
        else{

            $totalPrice = round($request->custom_price,2);
            $finalPrice = round(($totalPrice - $discount) + $request->extra_price, 2);

        }

        $request->request->add(['price' => $totalPrice]);
        $request->request->add(['discount_amount' => $discount]);
        $request->request->add(['final_price' => $finalPrice]);

        return $this->dateTimeSet($request);
    }
    private function dateTimeSet(Request $request){
        $datetime = new Carbon($request->journey_date." ".$request->pickup_time);

        $request->journey_date = $datetime->format('Y-m-d H:i:s');

        $request->request->add(['journey_date' => $datetime->format('Y-m-d H:i:s')]);
        return $request;
    }
    public function newCustomer(Request $request){
        if($request->newCustomer == '1')
        {
            if(User::where('email', '=', $request->email)->exists())
            {
                $user = User::where('email', '=', $request->email)->first();
                $request->request->add(['user_id' => $user->id]);
            }
            else
            {
                $password = $this->randomPassword();

                $data['name'] = $request->name;
                $data['email'] = $request->email;
//                $data['phone'] = $request->phone_number;
                $data['password'] = $password;
                $data['password_confirmation'] = $password;
//                $data['countryCode'] = $request->countryCode;
                $data['role_id'] = 2;
                $data['phone_full'] = '+'.$request->countryCode.$request->phone_number;

                try{
                    $createUser = New CreateNewUser();
                    $user = $createUser->create($data);
                    $request->request->add(['user_id' => $user->id]);
                }
                catch (Exception $exception)
                {

                }

            }
        }
        return $request;
    }
    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
