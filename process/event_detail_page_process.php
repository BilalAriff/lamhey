<?php 

$events = new Event("eventProcessPage");
$helper = new Helper();
$booking = new Booking();

$eventID = $helper->getURLParams("id");

$event = $events->getEvent($eventID);

// $eventId, $eventName, $description, $consultant, $consultantName, $user, $date

if (isset($_POST["confirm_booking"])) {
    $booking->bookEvent($_POST["event_id"],
              $_POST["event_name"],
              $_POST["description"],
              $_POST["booking_consultant"],
              $_POST["consultant_name"],
              $_POST["user_id"],
              $_POST["date"]);
}