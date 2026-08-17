<?php

namespace App\Http\Controllers;

use App\Facade\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function Pay(int $amount = 100){
        Payment::process($amount);
    }
    public function bkash(int $amount = 1000){
        Payment::BkashPayment($amount);
    }
    public function rocket(int $amount = 3000){
        Payment::RocketPayment($amount);
    }
}
