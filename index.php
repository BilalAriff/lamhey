<?php
    include_once "process/index_process.php";
?>


<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include "./partials/Head.php"?>

<body>
    <?php include_once "./partials/Navigation.php" ?>

    <div class="new">
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
                                <a href="consultant-list.php" style="font-size: 2em;font-weight: bold;">Consultants</a>
                                OR
                                <a href="events.php" style="font-size: 2em;font-weight: bold;">Events</a>
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
                    <h2 class="mb-5 theme-heading">Hire Our Best Consultants<br>Now</h2>
                </div>
            </div>
            <div class="row">
                <?php echo featuredConsultantList($featuredConsultants)?>
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
                <div class="col-12">
                    <div class="dynamic-top-event-list d-flex flex-row justify-content-center align-items-center">
                        <?php featuredCardList($featuredEvents); ?>
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