<?php

require_once '../Helpers/__classloader.php';

if (!isset($_GET['api-version']) || !isset($_GET['api-request'])) die("Invalid request");

// act accordingly based on api version
switch (strtolower($_GET['api-version'])) {
    default:
        $api = new \Api\v1($_GET['api-request']);
        break;
}