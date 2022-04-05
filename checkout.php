 <?php
// Render
require_once 'services/utils.php';

// Session
require "models/Session.php";
Session::start();

// Nous appelons l'autoloader pour avoir accès à Stripe.
require_once 'vendor/autoload.php';

// Models
require_once "models/Donation_detail.php";

// Titre de la page
$pageTitle = 'Donation Checkout';
$pagePath = 'checkout';

$donation_detail = new Donation_detail();
$donation = $donation_detail->findAll();
$lastDonation = end($donation);
$total = floatval($lastDonation['total']);
$donationId = $lastDonation['id'];


// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle', 'lastDonation', 'donation_detail', 'donationId', 'total'));
