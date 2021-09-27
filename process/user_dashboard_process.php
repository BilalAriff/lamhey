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
            <td class=""><div class="d-flex w-100 justify-content-between text-center"> $id<a href="booking-detail.php?id=$id"><i class="fa fa-eye ml-3" aria-hidden="true"></i></a></div> </td>
            <td class=""><div class="d-flex w-100 justify-content-between text-center"></div> $event <a href="event-detail-page.php?id=$eventId"><i class="fa fa-eye ml-3" aria-hidden="true"></i></a></div></td>
            <td class=""><div class="d-flex w-100 justify-content-between text-center"></div> $consultant<a href="consultant-profile.php?id=$consultantId"><i class="fa fa-eye ml-3" aria-hidden="true"></i></a></div></td>
            <td class="">$date</td>
            <td class=""><span class="$status font-weight-bold rounded-pill px-5 py-1"> $status </span></td>
            <td class="">$bookingDate</td>
         <tr>
        HTML;
    echo $card;
}

function bookingListRow($data) {
    array_map("bookingTd", $data);
}
