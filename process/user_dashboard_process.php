<?php

include_once "include_files.php";
session_start();

$app = new App();
$bookings = new Booking();
$user = new User($_SESSION['username']);

$bookingList = $bookings->getUserBookingList($_SESSION['userID']);
$complaints = $app->getUserComplaints($_SESSION['username']);
$customRequests = $user->getUserCustomBookingRequests($_SESSION['username']);


function customRequestTd($c) {

    $id = $c['id'];
    $userId = $c['user_id'];
    $userName = $c['username'];
    $consultantId = $c['consultant_id'];
    $consultantName = $c['consultant_name'];
    $description = $c['event_description'];
    $eventDate = $c['event_date'];
    $status = $c['event_status'];
    
    $card = 
        <<<HTML
         <tr>
            <td class="">$id</td>
            <td class=""><a href="consultant-profile?id=$consultantId">$consultantName</a></td>
            <td>$description</td>
            <td>$eventDate</td>
            <td><span class="$status font-weight-bold rounded-pill px-5 py-1"> $status</span></td>            
         <tr>
        HTML;
    echo $card;
}

function complaintTd($c) {

    $id = $c['id'];
    $userId = $c['user_id'];
    $userName = $c['username'];
    $consultantId = $c['consultant_id'];
    $consultantName = $c['consultant_name'];
    $description = $c['description'];
    $feedback = $c['feedback'];
    $status = $c['status'];
    
    $card = 
        <<<HTML
         <tr>
            <td class="">$id</td>
            <td class=""><a href="consultant-profile?id=$consultantId">$consultantName</a></td>
            <td>$description</td>
            <td>$feedback</td>
            <td><span class="$status font-weight-bold rounded-pill px-5 py-1"> $status</span></td>            
         <tr>
        HTML;
    echo $card;
}


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
            <td class=""><a href="booking-detail.php?id=$id">$id</a></td>
            <td class=""><a href="event-detail-page.php?id=$eventId">$event</a></td>
            <td class=""><a href="consultant-profile.php?id=$consultantId">$consultant</a></td>
            <td class="">$date</td>
            <td class=""><span class="$status font-weight-bold rounded-pill px-5 py-1">$status</span></td>
            <td class="">$bookingDate</td>
         <tr>
        HTML;
    echo $card;
}

function bookingListRow($data) {
    array_map("bookingTd", $data);
}

function complaintListRow($data) {
    array_map("complaintTd", $data);
}

function customRequestRow($data) {
    array_map("customRequestTd", $data);
}