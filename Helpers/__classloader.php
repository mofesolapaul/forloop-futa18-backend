<?php

// bootstrap
require_once 'consts.php';
require_once 'functions.php';

spl_autoload_register(function($classname) {
    $classname = preg_replace('/\\\/', DIRECTORY_SEPARATOR, $classname);
    $classname = $classname . '.php';
    $classname = __DIR__ . '/../Classes/' . $classname;

    if (file_exists($classname)) require_once $classname;
});