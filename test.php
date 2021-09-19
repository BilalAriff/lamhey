<?php

// session_start();
include_once "include_files.php";

$paymentMethod = new PaymentMethod();

$list = $paymentMethod->getPaymentMethodsList();

var_dump($list);

