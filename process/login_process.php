<?php
    $app = new App();
    $h = new Helper();
    $msg = '';
    $username = '';
    $h->isLoggedIn();

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
                $profileBlocked = $app->isProfileBlocked($username, "users");
                if (!$user->isValidLogin($_POST['password']))
                {
                    $msg = "Invalid Username or Password";
                }
                    if(!$profileBlocked) {
                        header("Location: profile-blocked.php"); 
                    } else
                        {
                            $userId = $user->getUserId($username);
                            $_SESSION['username'] = $username;
                            $_SESSION['role'] = "user";
                            $_SESSION['logged'] = true;  
                            $_SESSION['userID'] = $userId;
                            $_SESSION['profile_image'] = $user->getUserProfileImage($username); 
                            $msg = "User Login Succesfull";
                            header("Location: user-dashboard.php");            
                        }
                
            }

            if ($_POST["user_role"] == "consultant" ) {
                
                $consultant = new Consultant($username);
                $profileBlocked = $app->isProfileBlocked($username, "consultants");

                if (!$consultant->isValidLogin($_POST['password']))
                {
                    $msg = "Invalid Username or Password";
                }
                    if (!$profileBlocked) {
                        header("Location: profile-blocked.php");
                    } else
                
                    {
                    
                        $_SESSION['username'] = $consultant->getUsername();
                        $_SESSION['role'] = "consultant";
                        $_SESSION['logged'] = true;
                        $_SESSION['profile_image'] = $consultant->getConsultantProfileImage($username);
                        $_SESSION['userID'] = $consultant->getConsultantId($username); 
                        $_SESSION['userData'] = $consultant->getUserData();
                        $_SESSION['consultantInfo'] = $consultant->getConsultantProfileInfo($username);
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