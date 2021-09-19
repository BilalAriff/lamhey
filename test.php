<?php

// session_start();
include_once "include_files.php";

$portfolio = new Portfolio();


$singlePortfolio =  $portfolio->updateEventName("1", "Updated Title", "updated link", "updated description", "updated categories", "2021-09-19 10:54:54", "video");

var_dump($singlePortfolio);

