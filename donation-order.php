<?php

// PDO
require_once "models/Session.php";
require_once "models/Donation_product.php";
require_once "models/Donation_detail.php";
require_once "models/User.php"; 


// Démarrage de la session
Session::start();

// Déclarations variables:
$donation_product = new Donation_product;
$donation_detail= new Donation_detail;

//
$user_id=$_SESSION['auth']['id'];
$cart=json_decode($_GET["cart"]);
$total=0;
foreach($cart as $product){
    
$total+= $product->price * $product->qtt;

}

$today = date("Y-m-d H:i:s");

//insertion des données de la table donation_detail
$donation = $donation_detail->insert([
        ":total"=>$total,
        ":user_id"=>$user_id,
        ]);

$donation_detail_id=$donation;

//insertion chaque ligne de commande dans la table donation_product
foreach($cart as $product){
    $donation_products = $donation_product->insert([
        ":quantity"=>$product->qtt,
        ":donation_detail_id"=>$donation_detail_id,
        ":products_id"=>$product->id,
        ":price"=>$product->price
        
        ]);
}


// NOTE A VOIR EN URGENCE ET A COMPRENDRE + NOTE COMPLETE A FAIRE.