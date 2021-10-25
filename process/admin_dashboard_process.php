<?php
session_start();
include_once "include_files.php";

$h = new Helper();
$admin = new Admin("admin");

$bookingData = $admin->getBookingList();
$customBookingData = $admin->getCustomBookingList();
$complaintData = $admin->getComplaintList();
$blockedConsultants = $admin->getBlockedConsultantList();
$blockedUsers = $admin->getBlockedUserList();
$paymentMethods = $admin->getPaymentMethodsList();
$categories = $admin->getCategoryList();

var_dump($customBookingData);
// var_dump($categories);


function blockedUserTd($user) {

    $id = $user['id'];
    $username = $user['username'];
    $profileStatus = $user['profile_status'];

    $td = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td><a href="user-dashboard.php?id=$id">$username</a></td>
            <td><label class="rounded-pill py-1 px-3 $profileStatus text-uppercase">$profileStatus</label></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="unblockedUserAction" value="$id">
                    <button type="submit" class="btn btn-danger" name="unblockUser" value="unblockConsultant">Unblock</button>
                </form>
            </td>
         <tr>
        HTML;
    echo $td;
}

function blockedConsultantTd($consultant) {

    $id = $consultant['id'];
    $username = $consultant['username'];
    $profileStatus = $consultant['profile_status'];
    $consultantType = $consultant['consultant_type'];

    $td = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td><a href="consultant-profile.php?id=$id">$username</a></td>
            <td>$consultantType</td>
            <td><label class="rounded-pill py-1 px-3 $profileStatus text-uppercase">$profileStatus</label></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="blockedConsultantId" value="$id">
                    <button type="submit" class="btn btn-danger" name="unblockConsultant" value="unblockConsultant">Unblock</button>
                </form>
            </td>
         <tr>
        HTML;
    echo $td;
}

function custoomBookingTd($booking) {

    $id = $booking['id'];
    $userId = $booking['user_id'];
    $bookingUsername = $booking['username'];
    $consultant = $booking['consultant_name'];
    $consultntId = $booking['consultant_id'];
    $description = $booking['event_description'];
    $date = $booking['event_date'];
    $status = $booking['event_status'];
    $bookingDate = $booking['created_at'];

    $td = 

        <<<HTML
         <tr>
            <td>$id</td>
            <td class="text-primary">$bookingUsername</td>
            <td>$date</td>
            <td><label class="rounded-pill px-3 py-1 text-uppercase $status" for="">$status</label></td>
            <td>$bookingDate</td>
            <td><a href="custom-booking-detail.php?id=$id" data-toggle="modal" data-target="#customRequestInformation_$id">View</a>
            
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" >
                Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="customRequestInformation_$id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1 class="theme-heading">Custom Request ID: $id</h1>
                            <h5 class="theme-heading">Consultant Name: <a href="consultant-profile?id=$consultntId" class="theme-heading" href="">$consultant</a></h5>
                            <h5 class="theme-heading">Requested By: <strong>$bookingUsername</strong> </h5>
                            <h5 class="theme-heading">Description</h5>
                            <p>$description</p>
                            <h5 class="theme-heading">Booking Date: <span class="text-success">$date</span></h5>
                            <div class="d-flex justify-content-center align-items-center">
                                <label class="rounded-pill px-3 py-1 text-uppercase $status" for="">$status</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
            </td>
         <tr>
HTML;
    echo $td;
}

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

function category($c) {
        $id = $c['id'];
        $name = $c['name'];
    
        $_c = <<<HTML
                    
                        <div class="category-pill rounded-pill">
                            <span>$name</span>
                            <div class="delete-category">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary category-delete-btn" data-toggle="modal" data-target="#category$id">
                                <i class="fa fa-close "></i>
                            </button>
    
                            <!-- Modal -->
                            <div class="modal fade" id="category$id" tabindex="-1" role="dialog" aria-labelledby="$name" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h5 class="text-danger">ARE YOU SURE YOU WANT TO DELETE THIS CATEOGRY? </h5>
                                            <h4>You are Deleting</h4>
                                                <div class="name">
                                                    <h3>$name</h3>
                                                </div>
                                        </div>
                                            <div class="modal-footer d-flex align-items-center justify-content-center">
                                                <form action="" method="post">
                                                    <input type="hidden" name="category_id" value="$id">
                                                    <button type="submit" name="deleteCategory" value="deleteCateogry" class="btn bg-danger text-white">Delete</button>
                                                </form>
                                                <button data-dismiss="modal" type="button" class="btn btn-primary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
HTML;
    
    echo $_c;
}

function paymentMethod($p) {

    $id = $p['pm_id'];
    $name = $p['pm_name'];
    $icon = $p['pm_icon']; 

    $_p = <<<HTML
                
                    <div class="payment-method payment-method-large">
                        <div class="logo">
                            <img src="$icon" class="w-100" alt="">
                        </div>
                        <div class="delete-payment">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary payment-delete-btn" data-toggle="modal" data-target="#paymentMethod$id">
                            <i class="fa fa-close "></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="paymentMethod$id" tabindex="-1" role="dialog" aria-labelledby="paymentMethod$name" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h5 class="text-danger">ARE YOU SURE? </h5>
                                        <h4>You are Deleting</h4>
                                        <div class="payment-method payment-method-large">
                                            <div class="logo">
                                                <img src="$icon" class="w-100" alt="">
                                            </div>
                                            <br>
                                            <div class="name">
                                                <h3>$name</h3>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="modal-footer d-flex align-items-center justify-content-center">
                                            <form action="" method="post">
                                                <input type="hidden" name="payment_id" value="$id">
                                                <button type="submit" name="delete_payment" value="delete_payment" class="btn bg-danger text-white">Delete</button>
                                            </form>
                                            <button data-dismiss="modal" type="button" class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
HTML;

echo $_p;
}

function bookingList($data) {
    array_map("bookingTd", $data);
}

function customBookingList($data) {
    array_map("custoomBookingTd", $data);
}

function complaintList($data) {
    array_map("complaintTd", $data);
}

function blockedUserList($data) {
    array_map("blockedUserTd", $data);
}

function blockedConsultantList($data) {
    array_map("blockedConsultantTd", $data);
}

function paymentMethodList($data) {
    array_map("paymentMethod", $data);
}

function categoryList($data) {
    array_map("category", $data);
}

if(isset($_POST['updateStatus'])) {
    $admin->updateComplaintStatus($_POST['complaint-id'], $_POST['complaint-status']);
    $admin->updateComplaintFeedback($_POST['complaint-id'], $_POST['complaint-feedback']);
    header("Refresh:1");
}


if(isset($_POST['unblockConsultant'])) {
    $admin->unblockConsultant($_POST['blockedConsultantId']);
    header("Refresh:1");
}

if(isset($_POST['unblockUser'])) {
    $admin->unblockUser($_POST['unblockedUserAction']);
    header("Refresh:1");
}

if(isset($_POST['delete_payment'])) {
    $admin->removePaymentMethod($_POST['payment_id']);
    echo $_POST['payment_id'];
    header("Refresh:1");
}

if(isset($_POST['addPaymentMethod'])) {

    $file_tmp = $_FILES['payment_icon']['tmp_name'];
                    $file_name = $_FILES['payment_icon']['name'];
                    $file_size = $_FILES['payment_icon']['size'];
                    $file_type = $_FILES['payment_icon']['type'];
                    
                    // $userFolderName = $_POST["username"];
                    // $h->createUserFolder($userFolderName);

                    $file_location = "img/payment_methods/".$file_name;
                    
                    move_uploaded_file($file_tmp, "img/payment_methods/".$file_name);

    $admin->addPaymentMethod($_POST['payment_name'], $file_location);
    header("Refresh:1");
}

if(isset($_POST['addCategory'])) {
    $admin->addCategory($_POST['category_name']);
    header("Refresh:1");
}


if(isset($_POST['deleteCategory'])) {
    $admin->removeCategory($_POST['category_id']);
    header("Refresh:1");
}

if(isset($_POST['generate_report'])) {
    $bookingData = $admin->getBookingReport($_POST['start_date'], $_POST['end_date']);
}

if(isset($_POST['generate_custom_booking_report'])) {
    $customBookingData = $admin->getCustomBookingReport($_POST['start_date'], $_POST['end_date']);
}