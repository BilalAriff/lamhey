<?php 

$events = new Event("eventProcessPage");
$helper = new Helper();
$booking = new Booking();

$eventID = $helper->getURLParams("id");
$event = $events->getEvent($eventID);
$consultant = new Consultant($event["event_host_name"]);
$consultantInfo = $consultant->getConsultantProfileInfo($event["event_host_name"]);

if (isset($_POST["confirm_booking"])) {
    $booking->bookEvent($_POST["event_id"],
              $_POST["event_name"],
              $_POST["description"],
              $_POST["booking_consultant"],
              $_POST["consultant_name"],
              $_POST["user_id"],
              $_POST["user_username"],
              $_POST["date"]);
}