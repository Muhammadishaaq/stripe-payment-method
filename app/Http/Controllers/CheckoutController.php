<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        \Stripe\Stripe::setApiKey('sk_test_51NsJs8LD5JaV4SSkuRE9RqN2wvYm7xaHTj7LsmwoD1ZHfjfx6c8syDhG71R8Uyu1bTq59AdXtWm7D7M1vX2yZkRQ00SlbErPBw');
        $amount=100;
        $amount *=100;
        $payment_intent= \Stripe\PaymentIntent::create([
            'description' => 'Stripe Test Payment',
            'amount' => $amount,
            'currency' => 'AED',
            'description' => 'Payment From All About Laravel',
            'payment_method_types' => ['card'],
        ]);
        $intent=$payment_intent->client_secret;
        return view('checkout.credit-card',compact('intent'));
    }
    public function afterPayment(){
        echo'Payment Received, Thank you For Using Our Services';
    }
}
