<?php

$h = new Helper();
$msg = '';
$Msg = '';
$username = '';

if (isset($_POST['submit']))
{        
    $username = $_POST['username'];                

    if ($h->isEmpty(array($username, $_POST['password'], $_POST['confirm_password'])))
    {
        $msg = 'All fields are required';     
    }
    else if (!$h->isValidLength($username, 6, 100)){
        $msg = 'Username must be between 6 and 100 characters';
    }
    else if (!$h->isValidLength($_POST['password'])){
        $msg = 'Password must be between 8 and 20 characters';
    }
    else if (!$h->isSecure($_POST['password'])){
        $msg = 'Password must contain at least one lowercase character, one uppercase character and one digit';
    }
    else if (!$h->passwordsMatch($_POST['password'], $_POST['confirm_password'])){
        $msg = 'Passwords do not match';
    }        
    else
    {

            if($_POST["role"] == "user") {
        
                $user = new User($username);

                if ($user->isDuplicateID()) {
                    $msg = "Username Already in Use!";
                } else {

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
            }
        
                if ($_POST["role"] == "consultant") {
                    
                $user = new Consultant($username);
                
                if($user->isDuplicateID()) {
            
                    $msg = "Username Already in Use!";
            
                } else {
            
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
        }
        
    }

?>