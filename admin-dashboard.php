<?php
 include_once "./process/admin_dashboard_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "./partials/Head.php"; ?>

<body>
    <?php include_once "./partials/Navigation.php" ?>

    <!-- Header -->

    <div class="jumbotron bg-dark mt-3">
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

            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#bookings" role="tab"
                                aria-controls="home" aria-selected="true">Bookings</a>
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

                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Event Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Booking Date</th>
                                            <th scope="col">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo bookingList($bookingData)?>
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
                                            <th scope="col">ID</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Profile Status</th>
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
                                                            <input class="form-control" name="category_name" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                            <button type="submit" name="addCategory"
                                                                value="addCategory"
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
    let getID = (id) => {
        console.log(id);
    }
    </script>
</body>

</html>