<?php
    include_once "process/consultant_profile_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "./partials/Head.php"; ?>

<body>

    <?php include_once "./partials/Navigation.php" ?>

    <!-- User Profile Navigation -->

    <section class="profile-navigation-section bg-light-blue mt-3 sticky-top">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="#">About Me</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Photo Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Video Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reviews</a>
            </li>
        </ul>
    </section>

    <?php 
        if(!$Msg == "") {
           echo '<div class="alert alert-success text-center" role="alert"> <h4>'.$Msg.' </h4></div>';
        }
    ?>


    <!-- Header -->

    <div class="consultant-profile-jumbotron bg-light-blue mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="user-profile-header">
                        <div class="user-profile-avatar">
                            <img src="<?php echo $profile_details['profile_image'] ?>" alt="user profile pic">
                        </div>
                        <div class="user-profile-info">
                            <h1><?php echo $profile_details["firstname"]." ".$profile_details['lastname']; ?></h1>
                            <h5><?php echo $profile_details['consultant_type']?></h5>
                            <div class="user-rating">
                                <?php
                                    $helper->starRating($profile_details['rating']);
                                ?>
                            </div>
                            <div class="d-flex justify-content-start align-items-center">
                                <h5 class="text-uppercase my-auto mr-2"><?php echo $consultantAvailablity; ?></h5>
                                <div class="consultant-status <?php echo $consultantAvailablity; ?> mr-3"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="user-profile-actions">
                        <?php
                            if (isset($_SESSION['role'])) {
                                
                                if ($consultantAvailablity == "unavailable") {
                                    echo "<h5>Consultant is Unavailable at the moment!</h5>";
                                } else {
                                    if($_SESSION['role'] == 'user') {
                                        echo '<button class="btn btn-success mr-2" type="button" data-toggle="modal" data-target="#customEventRequest"> Request Event</button>';
                                        echo '<button class="btn btn-primary mr-2" type="button" data-toggle="modal" data-target="#review"> Add Review </button>';
                                        echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#complaint"> Lodge Complaint </button>';
                                    
                                    }
                                    
                                    if ($_SESSION['role'] == 'consultant' && $_SESSION['userID'] == $profileID) {
                                        echo "<a href='consultant-dashboard' class='btn btn-dark'>Visit your Dashboard</a>";
                                    }
                                }

                                if ( $_SESSION['role'] == 'admin' ) {
                                    
                                    $blockProfile = <<<HTML
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#blockProfile">Block Profile</button>;
                                        <div class="modal fade" id="blockProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-danger">Are you sure you want to block this profile?</h5>
                                                    <form action="" method="post">
                                                        <input type="hidden" name="profilelId" value="$profileID">
                                                        <div class="form-group">
                                                            <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>
                                                            <button type="submit" name="block_profile" value="block_profile" class="btn btn-danger">YES!</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
HTML;
                                        echo $blockProfile;
                                }
                            }
                            else {
                                echo "<h5>Please <a href='login.php'>Log In</a> for for more</h5>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <section class="about-me-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold">About Me</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 offset-md-2 text-right">
                    <div class="about-me-image">
                        <img src="<?php echo $profile_details['profile_image'] ?>" alt="about me picture">
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="about-me-description">
                        <p><?php echo $profile_details['about'] ?></p>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-6">
                    <div class="payment-methods">
                        <h5 class="theme-heading">Payment Methods</h5>
                        <?php paymentMethodList($paymentMethods); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="categories">
                        <h5 class="theme-heading">Categories</h5>
                        <?php categoryList($categories); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="photo-gallery-section bg-light-blue p-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold">Photo Gallery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="lightboxgallery-gallery clearfix">
                        <?php echo photoPortfolioList($photoPortfolio)?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-gallery-section p-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold">Video Gallery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php echo videoPortfolioList($videoPortfolio)?>
                </div>
            </div>
        </div>
    </section>

    <!-- User Bookings -->

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Events</h3>
            </div>
        </div>
        <div class="row">
            <div class="dynamic-top-event-list d-flex flex-row justify-content-center align-items-center">
                <?php featuredCardList($featuredEvents); ?>
            </div>
        </div>
    </div>

    <!-- Review Modal -->
    <div class="modal fade" id="review" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <h4>Pleasae give us your valuable feedback</h4>
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <i class="fa fa-star text-white" aria-hidden="true"></i>
                                    <span><strong class="text-white">1</strong></span>
                                    <input type="radio" value="1" name="user_rating" checked>
                                </label>
                                <label class="btn btn-primary">
                                    <i class="fa fa-star text-white" aria-hidden="true"></i>
                                    <span><strong class="text-white">2</strong></span>
                                    <input type="radio" value="2" name="user_rating"> Radio
                                </label>
                                <label class="btn btn-primary">
                                    <i class="fa fa-star text-white" aria-hidden="true"></i>
                                    <span><strong class="text-white">3</strong></span>
                                    <input type="radio" value="3" name="user_rating"> Radio
                                </label>
                                <label class="btn btn-primary">
                                    <i class="fa fa-star text-white" aria-hidden="true"></i>
                                    <span><strong class="text-white">4</strong></span>
                                    <input type="radio" value="4" name="user_rating"> Radio
                                </label>
                                <label class="btn btn-primary">
                                    <i class="fa fa-star text-white" aria-hidden="true"></i>
                                    <span><strong class="text-white">5</strong></span>
                                    <input type="radio" value="5" name="user_rating"> Radio
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="submit_rating" class="btn-dark">Give your ratings</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Complaint Modal -->
    <div class="modal fade" id="complaint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>We are Sorry for inconvienece</h4>
                    <h6 class="text-danger">Please Let us kwow whats the problem</h6>
                    <form action="" method="post">
                        <input type="hidden" name="complaint_user_id" value="<?php echo $_SESSION['userID']?>">
                        <input type="hidden" name="complaint_username" value="<?php echo $_SESSION['username']?>">
                        <input type="hidden" name="complaint_consultant_id" value="<?php echo $profile_details['id']?>">
                        <input type="hidden" name="complaint_consultant_name"
                            value="<?php echo $profile_details['username']?>">
                        <input type="hidden" name="complaint_feedback" value="we are working on your complaint">
                        <div class="form-group">
                            <label for="">Descripe in Detail about your complaint</label>
                            <textarea required name="complaint_description" class="form-control" cols="30"
                                rows="10"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-dark" type="submit" name="lodge_complaint"
                                value="lodge_complaint">Lodge
                                Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="customEventRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['userID']?>">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
                        <input type="hidden" name="consultant_id" value="<?php echo $profile_details['id']?>">
                        <input type="hidden" name="consultant_name" value="<?php echo $profile_details['username']?>">
                        <div class="form-group">
                            <h3>Request for Event</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Description of your Event</label>
                            <textarea name="event_description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Date of your Event</label>
                            <input class="form-control" type="date" name="event_date">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="request_event" value="request_event"
                                class="btn btn-success">Request Event</button>
                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include_once "./partials/Footer.php" ?>
    <?php include_once "./partials/ScriptTags.php" ?>

    <script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.lightboxgallery-gallery-item', function(event) {
            event.preventDefault();
            $(this).lightboxgallery({
                showCounter: true,
                showTitle: true,
                showDescription: true
            });
        });
    });
    </script>
</body>

</html>