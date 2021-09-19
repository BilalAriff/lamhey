<?php

// session_start();
include_once "include_files.php";

$consultant = new Consultant("bilal");

$payments = $consultant->changeAvailablity("16", "available");

var_dump(serialize(array("cash")));
var_dump(unserialize('a:1:{i:0;s:4:"cash";}'));
