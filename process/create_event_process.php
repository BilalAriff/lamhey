<?php

$h = new Helper();
$msg = '';
$Msg = '';
$eventName = "";

$link = mysqli_connect("localhost", "root", "", "lamheycomplete");

if (isset($_POST['submit'])) {

        $eventName = $_POST["eventName"];  
        $myEvent = new Event($eventName);

        $myEvent->createEvent($_POST['eventName'], $_POST['eventHost'], $_POST['eventCategory'], $_POST['eventDescription']);
    
    }
?>