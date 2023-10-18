<?php
    // Step 1: Require the library from your Composer vendor folder
    require_once 'vendor/autoload.php';

    use MercadoPago\Client\Payment\PaymentClient;
    use MercadoPago\Exceptions\MPApiException;
    use MercadoPago\MercadoPagoConfig;

    // Step 2: Set production or sandbox access token
    MercadoPagoConfig::setAccessToken("TEST-4347360308719648-101722-235750956ec06e726a73669e199d21d6-553546048");

    // Step 3: Initialize the API client
    $client = new PaymentClient();

    try {

        // Step 4: Create the request array
        $request = [
            "transaction_amount" => 50,
            "payment_method_id" => "pix",
            "payer" => [
                "email" => "1@teste.com",
            ]
        ];

        // Step 5: Make the request
        $payment = $client->create($request);
        echo $payment->id;

    // Step 6: Handle exceptions
    } catch (MPApiException $e) {
        echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
        echo "Content: " . $e->getApiResponse()->getContent() . "\n";
    } catch (\Exception $e) {
        echo $e->getMessage();
    }