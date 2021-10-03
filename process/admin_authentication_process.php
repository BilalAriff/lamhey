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
            $admin = new Admin($username);

                    if ($admin->isDuplicateID()) {
                        $msg = "Username Already in Use!";
                    } else {

                        $file_tmp = $_FILES['profile_image']['tmp_name'];
                        $file_name = $_FILES['profile_image']['name'];
                        $file_size = $_FILES['profile_image']['size'];
                        $file_type = $_FILES['profile_image']['type'];
                        
                        $userFolderName = $_POST["username"];
                        $h->createUserFolder($userFolderName);

                        $file_location = "uploads/".$userFolderName."/".$file_name;
                        
                        move_uploaded_file($file_tmp, "uploads/".$userFolderName."/".$file_name);

                        $admin->createUserProfile($_POST['username'],
                        $file_location, $_POST['email'], $_POST['firstname'],
                        $_POST['lastname'], $_POST['password'], 'admin',
                        $_POST['address'], $_POST['city'], $_POST['zip'], $_POST['state']);
                        
                        $Msg = "User Profile Succesfully Created!";
                }
            }
    }



 if(isset($_POST['admin_login'])) {
    $username = $_POST['username'];
    $admin = new Admin($username);

                if (!$admin->isValidLogin($_POST['password']))
                {
                    $msg = "Invalid Username or Password";
                }
                else
                
                {
                    
                    $_SESSION['username'] = $admin->getUsername();
                    $_SESSION['role'] = "admin";
                    $_SESSION['logged'] = true;
                    $_SESSION['profile_image'] = $admin->getAdminProfileImage($username);
                    $_SESSION['userID'] = $admin->getAdminId($username); 
                    $_SESSION['userData'] = $admin->getAdminData();
                    $_SESSION['consultantInfo'] = $admin->getAdminProfileInfo($username);
                    $msg = "Admin Login Succesfull";
                    header("Location: admin-dashboard.php");                
    }
 } 

?>
