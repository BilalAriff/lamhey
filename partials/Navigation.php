<!-- Navigation -->

<?php
    $username = "";
    $user_role = "";
    $dashboard_link = "" ;
    $user_avatar_link = "";

    if (isset($_SESSION['logged']) == true) {
        $username = $_SESSION['username'];
        $user_role = $_SESSION['role'];
        $dashboard_link = ( $user_role == "user") ? "user-dashboard.php" : "consultant-dashboard.php" ;
        $user_avatar_link = "img/avatars/2-m.jpg";
    }

?>

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
                    <li class="nav-item">
                        <a class="nav-link text-white mr-4 btn bg-light-purple" href="events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white btn bg-light-purple" href="consultant-list.php">Consultants</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION['logged']) !== false) {
                                // show when logged in
                                echo 
                                '<li class="nav-item">
                                    <div class="user-nav-avatar">
                                        <img src="'.$user_avatar_link.'" alt="user profile pic">
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="'.$dashboard_link.'" >'.$username.' | </a>
                                </li>
                                <li class="nav-item">
                                    <a href="logout.php" class="nav-link text-white">Log Out</a>
                                </li>';
                                
                            } else {
                                echo "
                                <li class='nav-item'>
                                    <a href='login.php' class='nav-link text-white'>Log in</a>
                                </li>";
                             }
                    ?>
                </ul>
                
            </div>
        </div>
    </nav>
</section>