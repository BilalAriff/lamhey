<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include "./partials/Head.php"?>

<body>

<?php include "./partials/Navigation.php" ?>

<div class = "new">
    <?php
    if (isset($_GET['new']))
    echo 'ACCOUNT CREATED SUCCESSFULLY';
    ?>
</div>

<!-- Home Slider -->
<section class="home-slider-section">
    <div id="home-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="img/banner/home-banner.png" alt="Home banner slider">
            <div class="container">
                <div class="home-slider-caption">
                    <h1 class="slider-heading">Online Event<br>Managment<br>Consultant System</h1>
                    <div class="home-banner-search">
                        <form class="form-group mt-4">
                            <input class="form-control" type="text">
                            <button class="btn home-search-btn btn-rounded">Search</button>
                        </form>
                    </div>
                    <img class="mt-3" src="img/vu-logo.jpg" width="140px">
                </div>
            </div>
          </div>
        </div>
      </div>
</section>

<!-- Top rated Consultants -->
<section class="top-consultant-section index-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-5">Hire Our Best Consultants<br>Now</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="consultant-card">
                    <div class="consultant-card-header">
                        <img src="./img/avatars/1-f.jpg" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">Nosheen Quyyum</h5>
                        <p class="consultant-card-type">Consultant</p>
                        <p class="consultant-card-location">Karachi, Sindh</p>
                        <h4 class="consultant-card-rating">5.0</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="consultant-card">
                    <div class="consultant-card-header">
                        <img src="./img/avatars/1-f.jpg" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">Nosheen Quyyum</h5>
                        <p class="consultant-card-type">Consultant</p>
                        <p class="consultant-card-location">Karachi, Sindh</p>
                        <h4 class="consultant-card-rating">5.0</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="consultant-card">
                    <div class="consultant-card-header">
                        <img src="./img/avatars/1-f.jpg" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">Nosheen Quyyum</h5>
                        <p class="consultant-card-type">Consultant</p>
                        <p class="consultant-card-location">Karachi, Sindh</p>
                        <h4 class="consultant-card-rating">5.0</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="consultant-card">
                    <div class="consultant-card-header">
                        <img src="./img/avatars/1-f.jpg" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">Nosheen Quyyum</h5>
                        <p class="consultant-card-type">Consultant</p>
                        <p class="consultant-card-location">Karachi, Sindh</p>
                        <h4 class="consultant-card-rating">5.0</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="consultant-card">
                    <div class="consultant-card-header">
                        <img src="./img/avatars/1-f.jpg" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">Nosheen Quyyum</h5>
                        <p class="consultant-card-type">Consultant</p>
                        <p class="consultant-card-location">Karachi, Sindh</p>
                        <h4 class="consultant-card-rating">5.0</h4>
                    </div>
                </div>     
            </div>
            <div class="col-sm-12 col-md-3 col-lg-2">
                <div class="consultant-card">
                    <div class="consultant-card-header">
                        <img src="./img/avatars/1-f.jpg" alt="">
                    </div>
                    <div class="consultant-card-body">
                        <h5 class="consultant-card-title">Nosheen Quyyum</h5>
                        <p class="consultant-card-type">Consultant</p>
                        <p class="consultant-card-location">Karachi, Sindh</p>
                        <h4 class="consultant-card-rating">5.0</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Event Section -->
<section class="top-events-section index-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-5">Book Our Top Rated Events<br>Now</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="event-card">
                    <div class="event-card-header">
                        <img src="img/event cards/birthday.jpg" alt="">
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title">Birthday Party Celebration For Adults</h5>
                        <label class="event-card-price">Rs. 25,000</label>
                    </div>
                    <div class="event-card-footer">
                        <div class="event-card-profile">
                            <div class="event-card-profile-header">
                                <img src="/img/avatars/2-f.jpg" alt="">
                            </div>
                            <h6 class="event-card-profie-username">User name</h6>
                        </div>
                        <button class="event-card-btn">View Event</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="event-card">
                    <div class="event-card-header">
                        <img src="img/event cards/birthday.jpg" alt="">
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title">Birthday Party Celebration For Adults</h5>
                        <label class="event-card-price">Rs. 25,000</label>
                    </div>
                    <div class="event-card-footer">
                        <div class="event-card-profile">
                            <div class="event-card-profile-header">
                                <img src="/img/avatars/2-f.jpg" alt="">
                            </div>
                            <h6 class="event-card-profie-username">User name</h6>
                        </div>
                        <button class="event-card-btn">View Event</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="event-card">
                    <div class="event-card-header">
                        <img src="img/event cards/birthday.jpg" alt="">
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title">Birthday Party Celebration For Adults</h5>
                        <label class="event-card-price">Rs. 25,000</label>
                    </div>
                    <div class="event-card-footer">
                        <div class="event-card-profile">
                            <div class="event-card-profile-header">
                                <img src="/img/avatars/2-f.jpg" alt="">
                            </div>
                            <h6 class="event-card-profie-username">User name</h6>
                        </div>
                        <button class="event-card-btn">View Event</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="event-card">
                    <div class="event-card-header">
                        <img src="img/event cards/birthday.jpg" alt="">
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title">Birthday Party Celebration For Adults</h5>
                        <label class="event-card-price">Rs. 25,000</label>
                    </div>
                    <div class="event-card-footer">
                        <div class="event-card-profile">
                            <div class="event-card-profile-header">
                                <img src="/img/avatars/2-f.jpg" alt="">
                            </div>
                            <h6 class="event-card-profie-username">User name</h6>
                        </div>
                        <button class="event-card-btn">View Event</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "./partials/Footer.php" ?>

<!-- =============   SCRIPTS   ============ -->
<?php include "./partials/ScriptTags.php" ?>

</body>
</html>