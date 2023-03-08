<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ExchangeController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke()
    {

        $req_url = 'https://v6.exchangerate-api.com/v6/cb728cbf3364e526b4dcf521/latest/USD';

        $response_json = file_get_contents($req_url);

        if ($response_json !== false) {

            try {
                $response = json_decode($response_json);

                if ($response->result  === 'success') {

                    $currencyValue = $response->conversion_rates;

                    $rates = [
                        "Emirates Derham (AED)" => $currencyValue->AED,
                        "British Pound (GBP)" => $currencyValue->GBP,
                        "Iranian Rial (IRR)" => $currencyValue->IRR,
                        "Euro (EUR)" => $currencyValue->EUR,
                        "Japanese Yen (JPY)" => $currencyValue->JPY,
                    ];

                    return view('index', ['rates' => $rates]);
                }
            } catch (Exception $e) {
             
                return $e;
            }
        }
    }
}
