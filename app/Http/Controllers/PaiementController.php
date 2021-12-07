<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Request2;
use HTTP_Request2;
//require_once base_path('vendor/fedapay/fedapay-php/lib/FedaPay.php');
//use FedaPay;
//use FedaPay\ApiKey;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Laracasts\Flash\Flash;
class PaiementController extends Controller
{

    public function test(){
        $pay =new FedaPay();
        $transac = new Transaction();

        $pay->setApiKey('sk_live_vAtXqoaLAoMScx0A9GYEOe0I');
        /**
         * @var \FedaPay\FedaPayObject
         */
        $response = \FedaPay\Customer::all();
        $customers = $response->customers;
        $meta = $response->meta;
        /*
        $pay->setEnvironment('sandbox');
        $transac->create(array(
            "description" => "Transaction for john.doe@example.com",
            "amount" => 500,
            "currency" => ["iso" => "XOF"],
            "callback_url" => "http://seg-shop.herokuapp.com",
            "customer" => [
                "firstname" => "Johnny",
                "lastname" => "DOEROUI",
                "email" => "bisgop@example.com",
                "phone_number" => [
                    "number" => "+22961651717",
                    "country" => "bj"
                ]
            ]
        ));*/

        var_dump($response);

    }
    /*
    public function creeTransaction(Request $request){

        $bibi = array(
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => $request->input('password')
        );

        $body = json_encode($bibi);

        $request = new HTTP_Request2('/https://ultrapay.herokuapp.com/user/register');
        $url = $request->getUrl();
        $request->setMethod(HTTP_Request2::METHOD_POST)
                ->setBody($body);

        echo $request->send()->getBody();



    }
    */
}
