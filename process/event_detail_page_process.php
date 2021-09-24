<?php 

$events = new Event("eventProcessPage");
$helper = new Helper();
$booking = new Booking();

$eventID = $helper->getURLParams("id");

$event = $events->getEvent($eventID);

if (isset($_POST["confirm_booking"])) {
    $booking->bookEvent($_POST["event_id"],
              $_POST["description"],
              $_POST["booking_consultant"],
              $_POST["user_id"],
              $_POST["date"]);
}