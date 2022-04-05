<?php

// Session
require "models/Session.php";
Session::start();

// Nous appelons l'autoloader pour avoir accès à Stripe.
require_once 'vendor/autoload.php';

// Models
require_once "models/Donation_detail.php";

// Variables
$donation_detail = new Donation_detail();
$donation = $donation_detail->findAll();
$lastDonation = end($donation);
$total = floatval($lastDonation['total']);
$donationId = $lastDonation['id'];
$totalCen = $total*100;

// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51K5a1EAZIwvGTcNZgK8MH9o2Bup4nTEoyAJHjtem0xs8ZlxbjSevmuyVXeq2JuDy15AKrwLxQ99wkYp5bAagCcru00AEO80DlW');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://rudysaksik.sites.3wa.io/ProjetFinal';

$checkout_session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
          'name' => 'Your commande',
          'currency' => 'eur',
          'amount' => $totalCen,
          'quantity' => 1,
      ]],
    'mode' => 'payment',
      'success_url' => $YOUR_DOMAIN . '/success.php?session_id={CHECKOUT_SESSION_ID}',
      'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
  ]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);