<?php
// contains helper functions available throughout the project

/**
 * Error disambiguation
 */
function statusCode($code)
{
    $status = array(
        200 => 'OK',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error'
    );
    return $status[$code] ?? $status[500];
}

function response($data, $code = 200) {
    header("HTTP/1.1 {$code} " . statusCode($code));
    return json_encode($data);
}