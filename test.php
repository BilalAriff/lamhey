<?php

session_start();
include_once "include_files.php";

$consultant = new Consultant("test");

$consultant->changeProfileAvailablity("16", "available");

$consultantAvailablity = $consultant->getProfileAvailablity("16");

var_dump($consultantAvailablity);
echo $consultantAvailablity;

?>





