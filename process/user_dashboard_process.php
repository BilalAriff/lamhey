<?php

include_once "include_files.php";
session_start();

$bookings = new Booking();

$bookingList = $bookings->getUserBookingList($_SESSION['userID']);

function bookingTd($booking) {

    $id = $booking['booking_id'];
    $event = $booking['booking_event'];
    $description = $booking['booking_description'];
    $consultant = $booking['booking_consultant'];
    $date = $booking['booking_date'];
    $status = $booking['booking_status'];
    $bookingDate = $booking['booking_createdAt'];
    
    $card = 
        <<<HTML
         <tr>
            <td>$id</td>
            <td>$event</td>
            <td><p>$description</p></td>
            <td>$consultant</td>
            <td>$date</td>
            <td>$status</td>
            <td>$bookingDate</td>
         <tr>
        HTML;
    echo $card;
}

function bookingListRow($data) {
    array_map("bookingTd", $data);
}
