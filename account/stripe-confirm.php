<?php
require __DIR__ . '/../vendor/autoload.php';
// Include Stripe PHP library

\Stripe\Stripe::setApiKey('sk_test_51QMvNkDv0X7rsbGmbNT0yQrtjRgFzTOGmt2pQkQgvSiYpCdp1s17vbNDwD3pi6jryv2Sj1VGknc7xPu6CtDYYmMS00oCvOqwzp'); // Replace with your Test Secret Key

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Retrieve the token from the POST data
    $token = $_POST['stripeToken'];

    // Create a charge
    $charge = \Stripe\Charge::create([
      'amount' => 5000, // Amount in cents (5000 = $50.00)
      'currency' => 'usd',
      'description' => 'Stripe Payment for Order',
      'source' => $token,
    ]);

    // Payment successful
    echo "Payment Successful!";
  } catch (\Stripe\Exception\CardException $e) {
    // Handle error
    echo 'Error: ' . $e->getMessage();
  }
}
