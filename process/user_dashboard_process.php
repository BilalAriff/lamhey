<?php

include_once "include_files.php";
session_start();

$bookings = new Booking();

$bookingList = $bookings->getUserBookingList($_SESSION['userID']);

function bookingTd($booking) {

    $id = $booking['booking_id'];
    $eventId = $booking['booking_event'];
    $event = $booking['booking_event_name'];
    $description = $booking['booking_description'];
    $consultantId = $booking['booking_consultant'];
    $consultant = $booking['booking_consultant_username'];
    $date = $booking['booking_date'];
    $status = $booking['booking_status'];
    $bookingDate = $booking['booking_createdAt'];
    
    $card = 
        <<<HTML
         <tr>
            <td>$id <br><a href="booking-detail.php?id=$id">View Detail</a> </td>
            <td>$event <br> <a href="event-detail-page.php?id=$eventId"> View Detail</a></td>
            <td><p>$description</p></td>
            <td>$consultant <br> <a href="consultant-profile.php?id=$consultantId"> View Profile</a></td>
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
