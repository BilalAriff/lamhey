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
                    

                    // =====================
                    
                    // $eventName = $_POST["eventName"];  
                    // $myEvent = new Event($eventName);
                    // $userFolderName = $_SESSION['username'];
            
                    // $file_tmp = $_FILES['eventImage']['tmp_name'];
                    // $file_name = $_FILES['eventImage']['name'];
                    // $file_size = $_FILES['eventImage']['size'];
                    // $file_type = $_FILES['eventImage']['type'];
            
                    // // change the name below for the folder you want
            
                    // $h->createUserFolder($userFolderName);
            
                    // $file_location = "uploads/".$userFolderName."/".$file_name;
                    
            
                    // move_uploaded_file($file_tmp, "uploads/".$userFolderName."/".$file_name);
            
                    // $myEvent->createEvent(
                    //     $_POST['eventName'],
                    //     $_SESSION['userID'],
                    //     $_POST['eventCategory'],
                    //     $_POST['eventDescription'],
                    //     $file_location);

                    // =====================



                    $file_tmp = $_FILES['profile_image']['tmp_name'];
                    $file_name = $_FILES['profile_image']['name'];
                    $file_size = $_FILES['profile_image']['size'];
                    $file_type = $_FILES['profile_image']['type'];
                    
                    $userFolderName = $_POST["username"];
                    $h->createUserFolder($userFolderName);

                    $file_location = "uploads/".$userFolderName."/".$file_name;
                    
                    move_uploaded_file($file_tmp, "uploads/".$userFolderName."/".$file_name); 
                    
                    $user->createConsultantProfile(
                        $_POST['username'],
                        $_POST['email'],
                        $_POST['consultant_type'],
                        $_POST['rating'],
                        $_POST['about'],
                        $file_location,
                        $_POST['firstname'],
                        $_POST['lastname'],
                        $_POST['password'],
                        $_POST['role'],
                        $_POST['address'],
                        $_POST['city'],
                        $_POST['zip'],
                        $_POST['state']);

                                
                    //    echo $_POST['username'];
                    //    echo "<br>";
                    //    echo $_POST['email'];
                    //    echo "<br>";
                    //    echo $_POST["consultant_type"];
                    //    echo "<br>";
                    //    echo $_POST["rating"];
                    //    echo "<br>";
                    //    echo $_POST["about"];
                    //    echo "<br>";
                    //    echo $file_location;
                    //    echo "<br>";
                    //    echo $_POST['firstname'];
                    //    echo "<br>";
                    //    echo $_POST['lastname'];
                    //    echo "<br>";
                    //    echo $_POST['password'];
                    //    echo "<br>";
                    //    echo $_POST['role'];
                    //    echo "<br>";
                    //    echo $_POST['address'];
                    //    echo "<br>";
                    //    echo $_POST['city'];
                    //    echo "<br>";
                    //    echo $_POST['zip'];
                    //    echo "<br>";
                    //    echo $_POST['state'];
                    //    echo "<br>";
                
                  $Msg = "Consultant Profile Succesfully Created!";
               
                }
            }
        }
        
    }

?>