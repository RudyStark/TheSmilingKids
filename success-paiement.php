<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;

require 'vendor/autoload.php';
require_once 'models/Payment.php';
require_once "models/Donation_detail.php";

$donation_detailM= new Donation_detail;
$paymentM = new Payment;
$donation_detail=$donation_detailM->findAll();
$lastDonation = end($donation_detail);
$total=floatval($lastDonation['total']);
$donationId=$lastDonation['id'];
$user_id=$_SESSION['auth']['id'];

$app = new \Slim\App;

$app->add(function ($request, $response, $next) {
  // Set your secret key. Remember to switch to your live secret key in production.
  // See your keys here: https://dashboard.stripe.com/apikeys
  \Stripe\Stripe::setApiKey('sk_test_51K5a1EAZIwvGTcNZgK8MH9o2Bup4nTEoyAJHjtem0xs8ZlxbjSevmuyVXeq2JuDy15AKrwLxQ99wkYp5bAagCcru00AEO80DlW');

  return $next($request, $response);
});

$app->get('success', function (Request $request, Response $response) {
  $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
});



$payment= $paymentM->insert([
        ":amount"=>$intent['amount']/100,
        ":status"=>$intent['status'],
        ":donation_detail_id"=>$donationId,
        ":user_id"=>$user_id,
        ]);


$app->run();
