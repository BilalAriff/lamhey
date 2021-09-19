<?php

// session_start();
include_once "include_files.php";

$booking = new Booking();

$bookingOne = $booking->getAllBookingList();

var_dump($bookingOne);

