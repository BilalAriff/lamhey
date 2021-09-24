<?php

session_start();
include_once "include_files.php";

$booking = new Booking();
$user = new User("BilalUser");

$bookingOne = $booking->getAllBookingList();

$userId = $user->getUserId("BilalUser");

var_dump($userId);

var_dump($_SESSION);