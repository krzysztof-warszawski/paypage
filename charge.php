<?php

use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
require 'config/config.php';
require_once('vendor/autoload.php');


    Stripe::setApiKey(SK_TEST_API);

    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    $customer = Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

    $charge = Charge::create(array(
        "amount" => 5000,
        "currency" => "usd",
        "description" => "Intro To React Course",
        "customer" => $customer->id
    ));

    header('Location: success.php?tid=' . $charge->id .
        '&product=' . $charge->description);


//    $intent = PaymentIntent::create([
//        'amount' => 1099,
//        'currency' => 'pln',
//        // Verify your integration in this guide by including this parameter
//        'metadata' => ['integration_check' => 'accept_a_payment'],
//    ]);
