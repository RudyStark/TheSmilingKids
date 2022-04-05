 <?php
// Render
require_once 'services/utils.php';

require "models/Session.php";
Session::start();
// Nous appelons l'autoloader pour avoir accès à Stripe.
require_once 'vendor/autoload.php';

require_once 'models/Payment.php';
require_once "models/Donation_detail.php";

// Titre de la page
$pageTitle = 'Paiement';
$pagePath = 'paiement';

$donation_detailM= new Donation_detail;
$paymentM = new Payment;
$donation_detail=$donation_detailM->findAll();
$lastDonation = end($donation_detail);
$total=floatval($lastDonation['total']);
$donationId=$lastDonation['id'];
$user_id=$_SESSION['auth']['id'];

// Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
\Stripe\Stripe::setApiKey('sk_test_51K5a1EAZIwvGTcNZgK8MH9o2Bup4nTEoyAJHjtem0xs8ZlxbjSevmuyVXeq2JuDy15AKrwLxQ99wkYp5bAagCcru00AEO80DlW');


// Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
$intent = \Stripe\PaymentIntent::create([
// Le prix doit être transmis en centimes
    'amount' => $total*100,
    'currency' => 'eur',
    'payment_method_types' => ['card'],
    'statement_descriptor' => 'Custom descriptor',
    'setup_future_usage' => 'on_session',
    'metadata' => [
            'order_id' => $donationId,
    ],
    ]);
    
// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle', 'lastDonation', 'donation_detail', 'intent', 'total'));
