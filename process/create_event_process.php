<?php

$h = new Helper();


if (isset($_POST['submit'])) {

        $eventName = $_POST["eventTitle"];  
        $myEvent = new Event($eventName);
        $userFolderName = $_SESSION['username'];

        $file_tmp = $_FILES['eventThumbnail']['tmp_name'];
        $file_name = $_FILES['eventThumbnail']['name'];
        $file_size = $_FILES['eventThumbnail']['size'];
        $file_type = $_FILES['eventThumbnail']['type'];

        // change the name below for the folder you want

        $h->createUserFolder($userFolderName);

        $file_location = "uploads/".$userFolderName."/".$file_name;
        

        move_uploaded_file($file_tmp, "uploads/".$userFolderName."/".$file_name);
        
        $myEvent->createEvent(
            $_POST['eventTitle'],
            $file_location,
            $_POST['eventPrice'],
            $_POST['eventHostID'],
            $_POST['eventHostAvatar'],
            $_POST['eventHostName'],
            $_POST['eventDescription'],
            $_POST['eventCategory']);
    }
?>      