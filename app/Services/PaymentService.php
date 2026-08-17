<?php

namespace App\Services;

class PaymentService{
    public function process($amount){
        echo "Payment is done $amount TK.";
    }
    public function BkashPayment($amount){
        echo "Bkash Payment has been done amount = $amount TK.";
    }
    public function RocketPayment($amount){
        echo "Rocket Payment has been done amount = $amount TK.";
    }
}