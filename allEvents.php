<?php

include_once "include_files.php";
include_once "./process/create_event_process.php";

    $myEvent = new Event($eventName);
    $allEvents = $myEvent->getAllEvents();
    print_r($allEvents);

    //traversing elements of an indexed array
    foreach ($allEvents as $val){
    echo "<br>";
    echo "===========";
    echo $val['eventName'];
    echo "<br>";
    echo $val['eventImage'];
    echo "<br>";
}
?>