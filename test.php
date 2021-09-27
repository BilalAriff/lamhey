<?php

session_start();
include_once "include_files.php";

$consultant = new Consultant('test');

$featuredConsultants = $consultant->featuredConsultants();

var_dump($featuredConsultants);


