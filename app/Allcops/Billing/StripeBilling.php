<?php

namespace App\Allcops\Billing;

use Config;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Error;

class StripeBilling implements BillingInterface
{
    public function __construct()
    {
        Stripe::setApiKey(Config::get('services.stripe.secret'));
    }

    public function charge(array $data)
    {
        try {
            return Charge::create ([
                'amount' => $data['amount'] * 100,
                'currency' => 'usd',
                'description' => $data['email'],
                'source' => $data['token'],
            ]);
        }
        catch (Error\Card $e) {
            dd('card declined ' . $e->getMessage());
        }
        //TODO - put in all othe exceptions, and then build a way for me to deal with them
        //        catch (Stripe_InvalidRequestError $e)
        //        {
        //            dd('invalid request error');
        //        }
    }
}