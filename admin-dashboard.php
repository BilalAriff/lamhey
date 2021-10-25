<?php
 include_once "./process/admin_dashboard_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "./partials/Head.php"; ?>

<body>
    <?php include_once "./partials/Navigation.php" ?>

    <!-- Header -->

    <div class="jumbotron bg-dark mt-3 dont-print">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-white">Admin Dashboard</h3>
                    <h1 class="text-white">Welcome, <span
                            style="font-weight: bold;"><?php echo $_SESSION['username']?></span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- User Bookings -->

    <!-- ============== CONSULTANT MAIN FUNCTIONALITIES ================== -->

    <section class="consultant-options">
        <div class="container">

            <div class="row dont-print">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#bookings" role="tab"
                                aria-controls="home" aria-selected="true">Bookings</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="custom-Booking-tab" data-toggle="tab" href="#customBookings" role="tab"
                                aria-controls="customBookings" aria-selected="true">Custom Bookings</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#complaints" role="tab"
                                aria-controls="profile" aria-selected="false">Complaints</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#blockedUsers" role="tab"
                                aria-controls="contact" aria-selected="false">Blocked Users</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#blockedConsultants" role="tab"
                                aria-controls="contact" aria-selected="false">Blocked Consultants</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#paymentMethods" role="tab"
                                aria-controls="contact" aria-selected="false">Payment Methods</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#categories" role="tab"
                                aria-controls="contact" aria-selected="false">Categories</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="bookings" role="tabpanel" aria-labelledby="home-tab">
                            <h1 class="text-center my-5 text-uppercase theme-heading">Bookings</h1>
                            <div class="admin-booking-list-table">
                                <form class="dont-print" action="" method="post">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="" class="for-col-label">Start Date</label>
                                            <input type="date" class="form-control" name="start_date">
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="for-col-label">End Date</label>
                                            <input type="date" class="form-control" name="end_date">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-dark" type="sumbit" name="generate_report"
                                            value="generate_report">Get Bookings</button>
                                        <a class="btn btn-success" href="admin-dashboard.php#bookings">All Bookings</a>
                                        <button class="btn btn-primary" onClick="window.print()">Print Report</button>
                                    </div>
                                </form>
                                <table class="table" id="bookingsTableTwo">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>User</th>
                                            <th>Event Date</th>
                                            <th>Status</th>
                                            <th>Booking Date</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bookingTableBody">
                                        <?php echo bookingList($bookingData)?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="customBookings" role="tabpanel" aria-labelledby="home-tab">
                            <h1 class="text-center my-5 text-uppercase theme-heading">Custom Bookings</h1>
                            <div class="admin-booking-list-table">
                                <form class="dont-print" action="" method="post">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="" class="for-col-label">Start Date</label>
                                            <input type="date" class="form-control" name="start_date">
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="for-col-label">End Date</label>
                                            <input type="date" class="form-control" name="end_date">
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-dark" type="sumbit" name="generate_custom_booking_report"
                                            value="generate_custom_booking_report">Get Bookings</button>
                                        <a class="btn btn-success" href="admin-dashboard.php#customBookings">All Bookings</a>
                                        <button class="btn btn-primary" onClick="window.print()">Print Report</button>
                                    </div>
                                </form>
                                <table class="table" id="bookingsTableTwo">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Booking Date</th>
                                            <th>Status</th>
                                            <th>Request Date</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bookingTableBody">
                                        <?php echo customBookingList($customBookingData)?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="complaints" role="tabpanel" aria-labelledby="profile-tab">

                            <h1 class="text-center theme-heading text-uppercase my-5">Complaints</h1>
                            <div class="admin-complaint-list-table">

                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Complainee</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Complaint Against</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Feedback</th>
                                            <th scope="col">Actiion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo complaintList($complaintData)?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="blockedUsers" role="tabpanel" aria-labelledby="contact-tab">
                            <h1 class="theme-heading py-4 text-uppercase text-center">Blocked Users</h1>
                            <div class="blocked-consultant-table">

                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Profile Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo blockedUserList($blockedUsers)?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="blockedConsultants" role="tabpanel"
                            aria-labelledby="contact-tab">
                            <h1 class="theme-heading py-4 text-uppercase text-center">Blocked Consultants</h1>
                            <div class="blocked-consultant-table">

                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Consultant Name</th>
                                            <th scope="col">Profile Status</th>
                                            <th scope="col">Consultant Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo blockedConsultantList($blockedConsultants)?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="paymentMethods" role="tabpanel" aria-labelledby="contact-tab">
                            <h1 class="theme-heading py-4 text-uppercase text-center">Payment Methods</h1>
                            <div class="row">
                                <div class="col-12 text-center pb-5">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addPaymentMethod">
                                        Add Payment Method
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addPaymentMethod" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addPaymentMethod">Add Payment Method
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="payment_icon">Select Icon</label>
                                                            <input type="file" class="form-control" name="payment_icon">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Name">Enter Payment Name</label>
                                                            <input class="form-control" name="payment_name" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <button type="submit" name="addPaymentMethod"
                                                                value="addPaymentMethod"
                                                                class="btn btn-primary">Add</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="payment-method-list">
                                        <?php echo paymentMethodList($paymentMethods) ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="contact-tab">
                            <h1 class="theme-heading py-4 text-uppercase text-center">Categories</h1>
                            <div class="row">
                                <div class="col-12 text-center pb-5">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addCategories">
                                        Add Categories
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addCategories" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addCategories">Add Categories
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="Name">Enter Category Name</label>
                                                            <input class="form-control" name="category_name"
                                                                type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <button type="submit" name="addCategory" value="addCategory"
                                                                class="btn btn-primary">Add</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="payment-method-list">
                                        <?php echo categoryList($categories) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ============== CONSULTANT MAIN FUNCTIONALITIES ENDS ================== -->

    <!-- ================= MODALS ==================== -->

    <!-- Complaint Action Modal
    <div class="modal fade" id="complaintAction" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ============== MODALS ENDS ================== -->

    <?php include_once "./partials/Footer.php" ?>
    <?php include_once "./partials/ScriptTags.php" ?>

    <script>
    $('#myTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');



    // admin dashaboard tables 

    // $(document).ready( function () {

    $('.bookingTableBody').children().last().remove()

    //     $('#bookingsTableTwo').DataTable({
    //     "paging":   true,
    //     "ordering": true,
    //     "info": true
    //     });
    // });


    // $(document).ready(function() {
    //     $('#bookingsTableTwo').DataTable({
    //         buttons: [
    //         'copy', 'excel', 'pdf']
    //     });
    // });

    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var startDate = parseInt($('#startDate').val(), 10);
            var endDate = parseInt($('#endDate').val(), 10);
            var date = parseFloat(data[5]) || 0; // use data for the age column

            if ((isNaN(startDate) && isNaN(endDate)) ||
                (isNaN(startDate) && date <= endDate) ||
                (startDate <= date && isNaN(endDate)) ||
                (startDate <= date && date <= endDate)) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        var table = $('#bookingsTableTwo').DataTable();

        $('#startDate').keyup(function() {
            table.draw();
        });
        $('#endDate').keyup(function() {
            table.draw();
        });
    });

    bookingsTableTwo
    </script>
</body>

</html>