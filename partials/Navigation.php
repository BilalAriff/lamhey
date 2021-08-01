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
                        <?php echo ( isset($_SESSION['logged']) !== false ) ? "<a href='logout.php' class='nav-link text-white'>Log Out</a>" : "<a href='login.php' class='nav-link text-white'>Log in</a>"; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>