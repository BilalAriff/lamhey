<?php
    session_start();
    session_destroy();
    include_once "include_files.php";
?>
    <body>
        <div class="logoutsuccess">
            <div class="card read-card">
                <div class="card-body">
                    <p>You have logged out successfully</p>
                    
                        <?php if (isset($_GET['admin'])): ?>
                        <div><a href = 'admin.php'>Click here to log in again</a></div>
                        <?php else: ?>
                        <div><a href = 'index.php'>Click here to log in again</a></div>
                        <?php endif; ?>
                </div>
            </div>

        </div>
    </body>
</html>    