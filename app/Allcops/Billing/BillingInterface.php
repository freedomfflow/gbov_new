<?php

namespace App\Allcops\Billing;


interface BillingInterface
{
    public function charge(array $data);
}