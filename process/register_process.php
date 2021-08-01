<?php

if(isset($_POST["submit"])) {

    if($_POST["role"] == "user") {

        $user = new User($username);

        $user->createUserProfile($_POST['username'],
        $_POST['email'],
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['password'],
        $_POST['role'],
        $_POST['address'],
        $_POST['city'],
        $_POST['zip'],
        $_POST['state']);
        
        $Msg = "User Profile Succesfully Created!";
    }

    if ($_POST["role"] == "consultant") {

        $user = new Consultant($username);

        $user->createConsultantProfile($_POST['username'],
        $_POST['email'],
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['password'],
        $_POST['role'],
        $_POST['address'],
        $_POST['city'],
        $_POST['zip'],
        $_POST['state']);
        
        $Msg = "Consultant Profile Succesfully Created!";
    }
}

    // $h = new Helper();
    // $msg = '';
    // $username = '';

    // if (isset($_POST['submit']))
    // {        
    //     $username = $_POST['username'];                

    //     if ($h->isEmpty(array($username, $_POST['password'], $_POST['confirm_password'])))
    //     {
    //         $msg = 'All fields are required';     
    //     }
    //     else if (!$h->isValidLength($username, 6, 100)){
    //         $msg = 'Username must be between 6 and 100 characters';
    //     }
    //     else if (!$h->isValidLength($_POST['password'])){
    //         $msg = 'Password must be between 8 and 20 characters';
    //     }
    //     else if (!$h->isSecure($_POST['password'])){
    //         $msg = 'Password must contain at least one lowercase character, one uppercase character and one digit';
    //     }
    //     else if (!$h->passwordsMatch($_POST['password'], $_POST['confirm_password'])){
    //         $msg = 'Passwords do not match';
    //     }        
    //     else
    //     {
    //         $user = new User($username);

    //         $user->createUserProfile($_POST['username'],
    //                                  $_POST['email'],
    //                                  $_POST['firstname'],
    //                                  $_POST['lastname'],
    //                                  $_POST['password'],
    //                                  $_POST['role'],
    //                                  $_POST['address'],
    //                                  $_POST['city'],
    //                                  $_POST['zip'],
    //                                  $_POST['state']);

    //         header("Location: ../user-dashboard.php");
            
    //     }
            
    // }


    // include_once("../database.php");

    

    //  Create Query

    // $sql = "INSERT INTO users (username, email, firstname, lastname, password, role, address, city, zip, state)
    //         VALUES (:username, :email, :firstname, :lastname, :password, :role, :address, :city, :zip, :state)";

    // $stmt = $pdo->prepare($sql);

    // // Bind Data

    // $stmt->bindValue(":username", $_POST['username']);
    // $stmt->bindValue(":email", $_POST['email']);
    // $stmt->bindValue(":firstname", $_POST['firstname']);
    // $stmt->bindValue(":lastname", $_POST['lastname']);
    // $stmt->bindValue(":password", $_POST['password']);
    // $stmt->bindValue(":role", $_POST['role']);
    // $stmt->bindValue(":address", $_POST['address']);
    // $stmt->bindValue(":city", $_POST['city']);
    // $stmt->bindValue(":zip", $_POST['zip']);
    // $stmt->bindValue(":state", $_POST['state']);

    // $stmt->execute();

    // header("Location: ../index.php");

?>