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
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="user-profile-actions">
                        <?php
                            if (isset($_SESSION['role'])) {
                                
                                   echo '<button class="btn btn-danger mr-2">Block Profile</button>'; 
                                   echo '<button class="btn btn-success mr-2"> Request Event</button>';
                                   echo '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#review"> Add Review </button>';
                                
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
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/rahul-anil.jpg" data-title="Rahul Anil"
                            data-alt="Rahul Anil" data-desc="A lightweight jQuery lightbox gallery plugin.">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/rahul-anil_thumb.jpg"
                                    title="Rahul Anil" alt="Rahul Anil">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Rahul Anil</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/noah-hinton.jpg" data-title="Noah Hinton"
                            data-alt="Noah Hinton" data-desc="A lightweight jQuery lightbox gallery plugin.">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/noah-hinton_thumb.jpg"
                                    title="Noah Hinton" alt="Noah Hinton">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Noah Hinton</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/ness-joshua.jpg" data-title="Ness Joshua"
                            data-alt="Ness Joshua" data-desc="A lightweight jQuery lightbox gallery plugin.">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/ness-joshua_thumb.jpg"
                                    title="Ness Joshua" alt="Ness Joshua">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Ness Joshua</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/matheus-ferrero.jpg"
                            data-title="Matheus Ferrero" data-alt="Matheus Ferrero" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/matheus-ferrero_thumb.jpg"
                                    title="Matheus Ferrero" alt="Matheus Ferrero">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Matheus Ferrero</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/meyer-aidan.jpg" data-title="Meyer Aidan"
                            data-alt="Meyer Aidan" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/meyer-aidan_thumb.jpg"
                                    title="Meyer Aidan" alt="Meyer Aidan">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Meyer Aidan</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/felix-russell-saw.jpg"
                            data-title="Felix Russell Saw" data-alt="Felix Russell Saw" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/felix-russell-saw_thumb.jpg"
                                    title="Felix Russell Saw" alt="Felix Russell Saw">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Felix Russell Saw</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/joshua-ness.jpg" data-title="Joshua Ness"
                            data-alt="Joshua Ness" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/joshua-ness_thumb.jpg"
                                    title="Joshua Ness" alt="Joshua Ness">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Joshua Ness</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/brooke-cagle.jpg" data-title="Brooke Cagle"
                            data-alt="Brooke Cagle" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/brooke-cagle_thumb.jpg"
                                    title="Brooke Cagle" alt="Brooke Cagle">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Brooke Cagle</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/emile-seguin.jpg" data-title="Emile Seguin"
                            data-alt="Emile Seguin" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/emile-seguin_thumb.jpg"
                                    title="Emile Seguin" alt="Emile Seguin">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Emile Seguin</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/caleb-frith.jpg" data-title="Caleb Frith"
                            data-alt="Caleb Frith" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/caleb-frith_thumb.jpg"
                                    title="Caleb Frith" alt="Caleb Frith">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Caleb Frith</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/bewakoof-com-official.jpg"
                            data-title="Bewakoof Com Official" data-alt="Bewakoof Com Official" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/bewakoof-com-official_thumb.jpg"
                                    title="Bewakoof Com Official" alt="Bewakoof Com Official">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Bewakoof Com Official</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/aidan-meyer.jpg" data-title="Aidan Meyer"
                            data-alt="Aidan Meyer" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/aidan-meyer_thumb.jpg"
                                    title="Aidan Meyer" alt="Aidan Meyer">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Aidan Meyer</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/allef-vinicius.jpg"
                            data-title="Allef Vinicius" data-alt="Allef Vinicius" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/allef-vinicius_thumb.jpg"
                                    title="Allef Vinicius" alt="Allef Vinicius">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Allef Vinicius</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/austin-mabe.jpg" data-title="Austin Mabe"
                            data-alt="Austin Mabe" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/austin-mabe_thumb.jpg"
                                    title="Austin Mabe" alt="Austin Mabe">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Austin Mabe</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/aidan-doe.jpg" data-title="Aidan Doe"
                            data-alt="Aidan Doe" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/aidan-doe_thumb.jpg"
                                    title="Aidan Doe" alt="Aidan Doe">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Aidan Doe</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/alexandru-zdrobau.jpg"
                            data-title="Alexandru Zdrobau" data-alt="Alexandru Zdrobau" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/alexandru-zdrobau_thumb.jpg"
                                    title="Alexandru Zdrobau" alt="Alexandru Zdrobau">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Alexandru Zdrobau</span>
                                </div>
                            </div>
                        </a>
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
                    <div class="lightboxgallery-gallery clearfix">
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/rahul-anil.jpg" data-title="Rahul Anil"
                            data-alt="Rahul Anil" data-desc="A lightweight jQuery lightbox gallery plugin.">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/rahul-anil_thumb.jpg"
                                    title="Rahul Anil" alt="Rahul Anil">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Rahul Anil</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/noah-hinton.jpg" data-title="Noah Hinton"
                            data-alt="Noah Hinton" data-desc="A lightweight jQuery lightbox gallery plugin.">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/noah-hinton_thumb.jpg"
                                    title="Noah Hinton" alt="Noah Hinton">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Noah Hinton</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/ness-joshua.jpg" data-title="Ness Joshua"
                            data-alt="Ness Joshua" data-desc="A lightweight jQuery lightbox gallery plugin.">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/ness-joshua_thumb.jpg"
                                    title="Ness Joshua" alt="Ness Joshua">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Ness Joshua</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/matheus-ferrero.jpg"
                            data-title="Matheus Ferrero" data-alt="Matheus Ferrero" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/matheus-ferrero_thumb.jpg"
                                    title="Matheus Ferrero" alt="Matheus Ferrero">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Matheus Ferrero</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/meyer-aidan.jpg" data-title="Meyer Aidan"
                            data-alt="Meyer Aidan" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/meyer-aidan_thumb.jpg"
                                    title="Meyer Aidan" alt="Meyer Aidan">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Meyer Aidan</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/felix-russell-saw.jpg"
                            data-title="Felix Russell Saw" data-alt="Felix Russell Saw" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/felix-russell-saw_thumb.jpg"
                                    title="Felix Russell Saw" alt="Felix Russell Saw">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Felix Russell Saw</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/joshua-ness.jpg" data-title="Joshua Ness"
                            data-alt="Joshua Ness" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/joshua-ness_thumb.jpg"
                                    title="Joshua Ness" alt="Joshua Ness">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Joshua Ness</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/brooke-cagle.jpg" data-title="Brooke Cagle"
                            data-alt="Brooke Cagle" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/brooke-cagle_thumb.jpg"
                                    title="Brooke Cagle" alt="Brooke Cagle">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Brooke Cagle</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/emile-seguin.jpg" data-title="Emile Seguin"
                            data-alt="Emile Seguin" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/emile-seguin_thumb.jpg"
                                    title="Emile Seguin" alt="Emile Seguin">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Emile Seguin</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/caleb-frith.jpg" data-title="Caleb Frith"
                            data-alt="Caleb Frith" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/caleb-frith_thumb.jpg"
                                    title="Caleb Frith" alt="Caleb Frith">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Caleb Frith</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/bewakoof-com-official.jpg"
                            data-title="Bewakoof Com Official" data-alt="Bewakoof Com Official" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/bewakoof-com-official_thumb.jpg"
                                    title="Bewakoof Com Official" alt="Bewakoof Com Official">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Bewakoof Com Official</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/aidan-meyer.jpg" data-title="Aidan Meyer"
                            data-alt="Aidan Meyer" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/aidan-meyer_thumb.jpg"
                                    title="Aidan Meyer" alt="Aidan Meyer">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Aidan Meyer</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/allef-vinicius.jpg"
                            data-title="Allef Vinicius" data-alt="Allef Vinicius" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/allef-vinicius_thumb.jpg"
                                    title="Allef Vinicius" alt="Allef Vinicius">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Allef Vinicius</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/austin-mabe.jpg" data-title="Austin Mabe"
                            data-alt="Austin Mabe" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/austin-mabe_thumb.jpg"
                                    title="Austin Mabe" alt="Austin Mabe">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Austin Mabe</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/aidan-doe.jpg" data-title="Aidan Doe"
                            data-alt="Aidan Doe" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/aidan-doe_thumb.jpg"
                                    title="Aidan Doe" alt="Aidan Doe">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Aidan Doe</span>
                                </div>
                            </div>
                        </a>
                        <a class="lightboxgallery-gallery-item" target="_blank"
                            href="https://kawshar.github.io/lightboxgallery/alexandru-zdrobau.jpg"
                            data-title="Alexandru Zdrobau" data-alt="Alexandru Zdrobau" data-desc="">
                            <div>
                                <img src="https://kawshar.github.io/lightboxgallery/alexandru-zdrobau_thumb.jpg"
                                    title="Alexandru Zdrobau" alt="Alexandru Zdrobau">
                                <div class="lightboxgallery-gallery-item-content">
                                    <span class="lightboxgallery-gallery-item-title">Alexandru Zdrobau</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Bookings -->

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Your Events</h3>
            </div>
        </div>
        <div class="row">
            <div class="dynamic-top-event-list d-flex flex-row justify-content-center align-items-center">
                <?php featuredCardList($featuredEvents); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center my-5">
                <h3>Your Booking Requests</h3>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button >
        Launch demo modal
    </button>

    <!-- Modal -->
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