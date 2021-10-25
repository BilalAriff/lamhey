<?php

session_start();
include_once "include_files.php";
$app = new App();

$h = new Helper();
// $h->protectedRoute($_SESSION['role'], 'consultant');
$consultant = new Consultant("consultant-dashboard");
$customEvent = new CustomEvent();

$consultantId = $_SESSION['userID'];

$app = new App();
$bookings = new Booking();
$events = new Event("consultant_events");


$allEvents = $events->getEventList();
$bookingList = $bookings->getConsultantBookingList($consultantId);
$eventListData = $events->getEventListByConsultant($consultantId);
$consultantAvailablity = $consultant->getProfileAvailablity($consultantId);
$customEvents = $customEvent->getConsultantCustomRequest($consultantId);
$allCategories = $app->getAllCategories();
$allPaymentMethods =  $app->getPaymentMethodsList();
$paymentMethods = $consultant->getPaymentMethods($consultantId);
$categories = $consultant->getCategories($consultantId);
 
function paymentMethod($p) {

    $name = $p;
    $payment =
    <<<HTML
        <div class="small-payment-method-label"> 
            <label>$name</label>
        </div>
    HTML; 
    echo $payment;
}

function category($c) {

    $name = $c;

    $category =
    <<<HTML
        <div class="small-category-label"> 
            <label>$name</label>
        </div>
    HTML; 

    echo $category;
}

function categoryOption($_category) {
    $id = $_category['id'];
    $name = $_category['name'];
    

    $option = <<<HTML
                    <input style="margin-right: 10px;" type="checkbox" id="$id" name="categories[]" value="$name">$name</option><br> 
                HTML;
    echo $option;
}

function paymentOption($_payment) {
    $id = $_payment['pm_id'];
    $name = $_payment['pm_name'];
    

    $option = <<<HTML
                    <input style="margin-right: 10px;" type="checkbox" id="pm_$id" name="payment_method[]" value="$name">$name</option><br> 
                HTML;
    echo $option;
}

function bookingTd($booking) {

    $id = $booking['booking_id'];
    $event = $booking['booking_event_name'];
    $description = $booking['booking_description'];
    $consultant = $booking['booking_consultant_username'];
    $date = $booking['booking_date'];
    $status = $booking['booking_status'];
    $bookingUsername = $booking['booking_user_username'];
    $bookingDate = $booking['booking_createdAt'];

    $card = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td>$event</td>
            <td>$bookingUsername</td>
            <td> $date</td>
            <td><span class="rounded-pill px-3 py-1 $status">$status</span></td>
            <td>$bookingDate</td>
            <td><a href="booking-detail.php?id=$id">View</a></td>
         <tr>
        HTML;
    echo $card;
}

function customEventTd($event) {

    $id = $event['id'];
    $userId = $event['user_id'];
    $username = $event['username'];
    $consultantId = $event['consultant_id'];
    $consultantName = $event['consultant_name'];
    $description = $event['event_description'];
    $eventDate = $event['event_date'];
    $eventStatus = $event['event_status'];

    

    $card = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td>$username</td>
            <td>$eventDate</td>
            <td> <label class="rounded-pill px-3 py-1 $eventStatus" for="">$eventStatus</label></td>
            <td>
                <!-- Action -->
                <a class="btn btn-primary" data-toggle="modal" data-target="#customEventDetail$id">
                    View Details
                </a>

                <!-- Modal -->
                <div class="modal fade" id="customEventDetail$id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="theme-heading">Event Request ID is: $id</h4>
                                <h6>Description</h6>
                                <p>$description</p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="accepted">
                                    <input type="hidden" name="event_id" value="$id">
                                    <button name="custom_event_status" value="custom_event_status" class="btn btn-success mr-3" type="submit">Accept</button>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="rejected">
                                    <input type="hidden" name="event_id" value="$id">   
                                    <button name="custom_event_status" value="custom_event_status" class="btn btn-danger" type="submit">Reject</button>
                                </form>
                            </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
            </td>
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
        <div class="event-card my-3">
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
                        <img src="$hostAvatar" alt="">
                    </div>
                    <h6 class="event-card-profie-username">$hostName</h6>
                </div>
            <a href="event-detail-page?id=$id" class="event-card-btn">View Event</a>
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

function customEventList($data) {
    array_map("customEventTd", $data);
}

function paymentMethodList($data) {
    array_map("paymentOption", $data);
}

function categoryList($data) {
    array_map("categoryOption", $data);
}


function consultantPaymentMethodList($data) {
    array_map("paymentMethod", $data);
}

function consultantCategoryList($data) {
    array_map("category", $data);
}


if (isset($_POST['change_status'])) {
    $consultant->changeProfileAvailablity($consultantId, $_POST['profile_status']);
    header("Refresh:0.1");
}

if(isset($_POST['custom_event_status'])) {
    $customEvent->manageCustomRequest($_POST['action'], $_POST['event_id']);
    header("Refresh:0.1");
}

if(isset($_POST['add_payment_methods'])) {
    $consultant->addPaymentMethods($_POST['payment_method'], $consultantId);
    header("Refresh:0.1");
}

if(isset($_POST['add-categories'])) {
    $consultant->addCategories($_POST['categories'], $consultantId);
    header("Refresh:0.1");   
}
