<?php

$h = new Helper();
$msg = '';
$Msg = '';
$eventName = "";

if (isset($_POST['submit'])) {

        $eventName = $_POST["eventName"];  
        $myEvent = new Event($eventName);
        $userFolderName = $_SESSION['username'];

        $file_tmp = $_FILES['eventImage']['tmp_name'];
        $file_name = $_FILES['eventImage']['name'];
        $file_size = $_FILES['eventImage']['size'];
        $file_type = $_FILES['eventImage']['type'];

        // change the name below for the folder you want

        $h->createUserFolder($userFolderName);

        $file_location = "uploads/".$userFolderName."/".$file_name;
        

        move_uploaded_file($file_tmp, "uploads/".$userFolderName."/".$file_name);

        $myEvent->createEvent(
            $_POST['eventName'],
            $_SESSION['userID'],
            $_POST['eventCategory'],
            $_POST['eventDescription'],
            $file_location);
    }
?>      