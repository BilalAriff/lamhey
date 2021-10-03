<?php
session_start();
include_once "include_files.php";

$h = new Helper();
$admin = new Admin("admin");

$bookingData = $admin->getBookingList();
$complaintData = $admin->getComplaintList();

function bookingTd($booking) {

    $id = $booking['booking_id'];
    $userId = $booking['booking_user'];
    $event = $booking['booking_event_name'];
    $description = $booking['booking_description'];
    $consultant = $booking['booking_consultant_username'];
    $date = $booking['booking_date'];
    $status = $booking['booking_status'];
    $bookingUsername = $booking['booking_user_username'];
    $bookingDate = $booking['booking_createdAt'];

    $td = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td>$event</td>
            <td><a href="user-dashboard.php?id=$userId">$bookingUsername</a></td>
            <td>$date</td>
            <td><label class="rounded-pill px-3 py-1 text-uppercase $status" for="">$status</label></td>
            <td>$bookingDate</td>
            <td><a href="booking-detail.php?id=$id">View</a></td>
         <tr>
        HTML;
    echo $td;
}

function complaintTd($complaint) {

    $id = $complaint['id'];
    $userId = $complaint['user_id'];
    $username = $complaint['username'];
    $consultantId = $complaint['consultant_id'];
    $consultantName = $complaint['consultant_name'];
    $description = $complaint['description'];
    $feedback = $complaint['feedback'];
    $status = $complaint['status'];

    $td = 
        <<<HTML
            <tr>
                <td>$id</td>
                <td><a href="user-dashboard.php?id=$userId">$username</a></td>
                <td>$description</td>
                <td><a href="consultant-profile.php?id=$consultantId">$consultantName</a></td>
                <td><label class="rounded-pill px-3 py-1 text-uppercase $status" for="">$status</label></td>
                <td><p>$feedback</p></td>
                <td>
                    <a href="" onclick="getID(this.id)" id="$id" data-toggle="modal" data-target="#complaintAction$id">Take Action</a>
                    <div class="modal fade" id="complaintAction$id" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Complaint ID No. $id</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class=""><strong>Complaint By:</strong> <a href="user-dashboard.php?id=$userId">$username</a></p>
                                    <p class=""><strong>Against:</strong> <a href="consultant-profile.php?id=$consultantId">$consultantName</a></p>
                                    <div class="complaint-description">
                                        <h6 class="text-uppercase">description</h6>
                                        <p class="p-4">"$description"</p>
                                    </div>
                                    <div class="complaint-feedback">
                                        <h6 class="text-uppercase">Feedback</h6>
                                        <p class="p-4">"$feedback"</p>
                                    </div>
                                    <div class="update-complaint-status">
                                        <form action="" method="post">
                                            <input type="hidden" name="complaint-id" value="$id">
                                            <div class="form-group">
                                                <label for="">Update Complaint Status</label>
                                                <select class="form-control" name="complaint-status">
                                                    <option value="resolved">Resolved</option>
                                                    <option value="inprocess">In Process</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Give Your Feedback</label>
                                                <textarea name="complaint-feedback" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="updateStatus" value="updateStatus" class="btn btn-dark">Update Status</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            <tr>
        HTML;
        echo $td;
}

function bookingList($data) {
    array_map("bookingTd", $data);
}

function complaintList($data) {
    array_map("complaintTd", $data);
}

if(isset($_POST['updateStatus'])) {
    $admin->updateComplaintStatus($_POST['complaint-id'], $_POST['complaint-status']);
    $admin->updateComplaintFeedback($_POST['complaint-id'], $_POST['complaint-feedback']);
    header("Refresh:1");
}
