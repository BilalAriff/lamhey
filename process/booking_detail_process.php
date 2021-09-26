<?php 

session_start();
include_once "include_files.php";

$h = new Helper();
$b = new Booking();

$bookingId = $h->getURLParams("id");  
$booking = $b->getBooking($bookingId);

if(isset($_POST['submit'])) {
    $b->changeBookingStatus($bookingId, $_POST['action']);
}


