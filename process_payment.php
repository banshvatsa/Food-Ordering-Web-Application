<?php
// Load the Stripe SDK

\Stripe\Stripe::setApiKey('sk_test_51QMvNkDv0X7rsbGmbNT0yQrtjRgFzTOGmt2pQkQgvSiYpCdp1s17vbNDwD3pi6jryv2Sj1VGknc7xPu6CtDYYmMS00oCvOqwzp'); // Replace with your Test Secret Key

header('Content-Type: application/json');

try {
  $paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => 1000, 
    'currency' => 'usd',
  ]);
  echo json_encode(['clientSecret' => $paymentIntent->client_secret]);
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}
