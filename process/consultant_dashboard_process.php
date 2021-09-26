<?php

session_start();
include_once "include_files.php";
$h = new Helper();
$h->protectedRoute($_SESSION['role'], 'consultant');

$consultantId = $_SESSION['userID'];

$bookings = new Booking();
$events = new Event("consultant_events");

$allEvents = $events->getEventList();
$bookingList = $bookings->getConsultantBookingList($consultantId);
$eventListData = $events->getEventListByConsultant($consultantId);

function bookingTd($booking) {

    $id = $booking['booking_id'];
    $event = $booking['booking_event_name'];
    $description = $booking['booking_description'];
    $consultant = $booking['booking_consultant_username'];
    $date = $booking['booking_date'];
    $status = $booking['booking_status'];
    $bookingUsername = $booking['booking_user_username'];
    $bookingDate = $booking['booking_createdAt'];
 
    // $dateObj = $booking['booking_date'];    
    // $date = new DateTime($dateObj);

    // echo $date->diff($now)->format("%d days, %h hours and %i minuts");

    
    // $_date = date_format($date,'y "-" M "-" DD');
    $card = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td>$event</td>
            <td>$bookingUsername</td>
            <td> $date</td>
            <td>$status</td>
            <td>$bookingDate</td>
            <td><a href="booking-detail.php?id=$id">View</a></td>
         <tr>
        HTML;
    echo $card;
}

// Consultant Events

function eventListCard($event) {   
    $id = $event['event_id'];
    $title = $event['event_title'];
    $thumbnail = $event['event_thumbnail'];
    $price = $event['event_price'];
    $host = $event['event_host'];
    $hostAvatar = $event['event_host_avatar'];
    $hostName = $event['event_host_name'];
    $description = $event['event_description'];
    $categories = $event['event_categories'];
    $featured = $event['event_featured'];
    $date = $event['event_created'];

    $card = 
    <<<HTML
     <div class="col-3">
        <div class="event-card mx-3">
            <div class="event-card-header">
                <img src="$thumbnail" alt="">
            </div>
            <div class="event-card-body">
                <h5 class="event-card-title">$title</h5>
                <label class="event-card-price">Rs. $price</label>
            </div>
            <div class="event-card-footer">
                <div class="event-card-profile">
                    <div class="event-card-profile-header">
                        <img src="$thumbnail" alt="">
                    </div>
                    <h6 class="event-card-profie-username">$hostName</h6>
                </div>
            <a href="/event-detail-page?id=$id" class="event-card-btn">View Event</a>
            </div>
        </div>
     </div>
    HTML;
    echo $card;
}

function bookingListRow($data) {
    array_map("bookingTd", $data);
}

function eventsList($_events) {
    array_map("eventListCard", $_events);
}
