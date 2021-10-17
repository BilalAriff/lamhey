<?php 

session_start();
include_once "include_files.php";

$h = new Helper();
$b = new Booking();

$bookingId = $h->getURLParams("id");  
$booking = $b->getBooking($bookingId);
$bookingStatus = $booking['booking_status'];



if(isset($_POST['submit'])) {
    $b->changeBookingStatus($bookingId, $_POST['action']);
    header('refresh:00.01');
}

function bookingOptions($status) {

    $consultantBtn = <<<HTML
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-danger mr-4">
            Reject
            <input type="radio" name="action" value="rejected">
        </label>
        <label class="btn btn-success">
            Accept
            <input type="radio" name="action" value="accepted">
        </label>
    </div>
    <div class="form-group text-center mt-4">
        <button type="submit" name="submit" value="submit"
        class="btn btn-dark">Confirm</button>
     </div>
    HTML;

    if($status == 'accepted' || $status == "rejected") {
        echo "<span class='rounded-pill px-3 py-1 $status'>You Have $status The Booking</span>";
    } else {
        echo $consultantBtn;
    }
}