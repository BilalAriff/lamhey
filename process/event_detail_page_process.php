<?php 

$app = new App();
$events = new Event("eventProcessPage");
$helper = new Helper();
$booking = new Booking();

$eventID = $helper->getURLParams("id");
$event = $events->getEvent($eventID);
$consultant = new Consultant($event["event_host_name"]);
$consultantInfo = $consultant->getConsultantProfileInfo($event["event_host_name"]);
$eventBooked = $app->isEventBookedTest($eventID, $_SESSION['userID']);
$eventFeatured = $events->isEventFeatured($eventID);

if (isset($_POST["confirm_booking"])) {
    $booking->bookEvent($_POST["event_id"],
              $_POST["event_name"],
              $_POST["description"],
              $_POST["booking_consultant"],
              $_POST["consultant_name"],
              $_POST["user_id"],
              $_POST["user_username"],
              $_POST["date"]);
    header('refresh:000.1');
}

function bookingBtn($bookingStatus) {
    if($bookingStatus == false) {
        $bookBtn = <<<HTML
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Book Event
        </button>        
    HTML;
    echo $bookBtn;
    
    } else {
        echo "<h5 class='text-success'>You Have Already Booked this Event</h5>";
    }
    
}

function eventFeatured($featured) {
    if($featured == "0") {
        echo "";
    }
    if($featured == "1") {
        echo "<span class='featured-event'>Featured</span>";
    }
}

