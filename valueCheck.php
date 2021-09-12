<?php

session_start();
// include_once "include_files.php";
// include_once "./process/login_process.php";

    if( isset( $_SESSION['logged']) == false ) {
        echo "<strong>Login Status: </strong> You are Not Logged in <br>";
    } else {

        $user_data = $_SESSION['userData'];
        $username = $user_data['username'];
        $first_name = $user_data['lastname'];
        $last_name = $user_data['firstname'];

        echo "
            <strong>Login Status: </strong> You are logged in <br>
            <strong>username: </strong>".$username.".<br>
            <strong>first name: </strong>".$first_name."<br>
            <strong>last name: </strong>".$last_name."<br>
            ";
        var_dump($user_data);
    } 

        
?>


<!-- <strong>last name: </strong> You are Not Logged in <br>
<strong>role: </strong> You are Not Logged in <br>
<strong>consultant type: </strong> You are Not Logged in <br>
<strong>about: </strong> You are Not Logged in <br> -->