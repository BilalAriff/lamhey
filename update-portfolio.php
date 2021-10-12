<?php

    $Msg = "";
    session_start();
    include_once "include_files.php";
    include_once "process/update_portfolio_process.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <title>Home - Lamhey</title>
</head>
<body>

<!-- Navigation -->

<section class="navigation">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand text-white" href="index.php">Logo</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="login.php" class="nav-link text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<section class="login-page-section">
    <div class="container">
        <div class="row">
            <div class="offset-sm-3 offset-md-3 col-sm-12 col-md-6">
                <div class="login-form">
                    <div class="form-group text-center">
                        <h2>Update Your Portfolio</h2>
                        <h4 class="text-success"><?php echo $Msg ?></h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="current_imate">Thumbnail</label>
                            <img src="<?php echo $link?>" alt="">
                        </div>
                        <div class="form-group">
                            <label for="Thumbnail">Thumbnail</label>
                            <input required type="file" name="link">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input required value="<?php echo $title ?>" name="title" placeholder="Educational Seminar" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea required value="<?php echo $description ?>" name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <input required name="consultant" type="hidden" value="<?php echo $_SESSION['userID']?>">
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <label for="old-categories"><?php echo $categories ?></label>
                            <select required name="categories" class="form-control">
                                <?php echo catOption($categories)?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input value="<?php echo $date ?>" required name="date" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="photo">Photo</label>
                                    <input required type="radio" value="photo" name="type">
                                </div>
                                <div class="col-6">
                                    <label for="video">Video</label>
                                    <input required type="radio" name="type" value="video">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark" value="submit" name="submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<section class="main-footer-section">
    <footer class="main-footer text-center bg-dark">
        <h4>Book Online Event Managment Consultant</h4>
        <h5><strong>Bilal Arif</strong> - FYP</h5>
    </footer>
    <footer class="copyright-footer">
        <h6>Bilal Arif - BC170400198 - 2021</h6>
    </footer>
</section>

<!-- =============   SCRIPTS   ============ -->

    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>
</html>