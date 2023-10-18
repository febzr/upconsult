<?php
        namespace MercadoPago;
        include 'vendor/mercadopago/dx-php/src/MercadoPago/MercadoPagoConfig.php';
        include 'vendor/mercadopago/dx-php/src/MercadoPago/Resources/Payment.php';
        require_once 'vendor/autoload.php';
        use MercadoPago\MercadoPagoConfig;
        use MercadoPago\Resources\Payment;

        MercadoPagoConfig::setAccessToken("ENV_ACCESS_TOKEN");

        $payment = new Payment();
        $payment->transaction_amount = 100;
        $payment->description = "Título do produto";
        $payment->payment_method_id = "pix";
        $payment->payer = array(
            "email" => "test@test.com",
            "first_name" => "Test",
            "last_name" => "User",
            "identification" => array(
                "type" => "CPF",
                "number" => "19119119100"
            ),
            "address"=>  array(
                "zip_code" => "06233200",
                "street_name" => "Av. das Nações Unidas",
                "street_number" => "3003",
                "neighborhood" => "Bonfim",
                "city" => "Osasco",
                "federal_unit" => "SP"
            )
          );

        $payment->save();

        ?>