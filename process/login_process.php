<?php

    $h = new Helper();
    $msg = '';
    $username = '';

    if (isset($_POST['submit']))
    {        
        $username = $_POST['username'];                

        if ($h->isEmpty(array($username, $_POST['password'])))
        {
            $msg = 'All fields are required';     
        }
        else
        {
            if($_POST["user_role"]  == "user") {

                $user = new User($username);

                if (!$user->isValidLogin($_POST['password']))
                {
                    $msg = "Invalid Username or Password";
                }
                else
                {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "user";
                    $_SESSION['logged'] = true;    
                    $msg = "User Login Succesfull";
                    header("Location: user-dashboard.php");            
                }
                
            }

            if ($_POST["user_role"] == "consultant" ) {
                
                $consultant = new Consultant($username);

                if (!$consultant->isValidLogin($_POST['password']))
                {
                    $msg = "Invalid Username or Password";
                }
                else
                {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "consultant";
                    $_SESSION['logged'] = true;
                    $msg = "Consultant Login Succesfull";
                    header("Location: consultant-dashboard.php");                
                }
            }

            if ($_POST["user_role"] == "admin" ) {
                
                $admin = new Admin($username);

                if (!$admin->isValidLogin($_POST['password']))
                {
                    $msg = "Invalid Username or Password";
                }
                else
                {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "admin";
                    $_SESSION['logged'] = true;
                    $msg = "Admin Login Succesfull";
                    header("Location: admin-dashboard.php");                
                }
            }

        }
        
    }