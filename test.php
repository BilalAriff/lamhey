<?php

session_start();
include_once "include_files.php";

$admin = new Admin("test");


$payment = $admin->getPaymentMethodsList("2");

var_dump($payment);



