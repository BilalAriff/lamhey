<?php

    function myAutoloader($class) {
        include_once INC_DIR.'includes/classes/'.$class.'.php';
    }

    spl_autoload_register('myAutoloader');