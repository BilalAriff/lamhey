<?php

session_start();
include_once "include_files.php";

$complaint = new Complaint();
$complaint->lodgeComplaint("32", "BilalUser", "16","BilalConsultant", "tooo awesome to handle", "working on your complaint", "pending");

var_dump();


