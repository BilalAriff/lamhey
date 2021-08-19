<?php

$h = new Helper();
$msg = '';
$Msg = '';
$eventName = "";

$link = mysqli_connect("localhost", "root", "", "lamheycomplete");

if (isset($_POST['submit'])) {

        $eventName = $_POST["eventName"];  
        $myEvent = new Event($eventName);

        $file_tmp = $_FILES['eventImage']['tmp_name'];
        $file_name = $_FILES['eventImage']['name'];
        $file_size = $_FILES['eventImage']['size'];
        $file_type = $_FILES['eventImage']['type'];

        $file_location = "uploads/".$file_name;

        move_uploaded_file($file_tmp, "uploads/".$file_name);

        $myEvent->createEvent(
            $_POST['eventName'],
            $_SESSION['userID'],
            $_POST['eventCategory'],
            $_POST['eventDescription'],
            $file_location);
    }
?>      