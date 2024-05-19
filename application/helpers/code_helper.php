<?php

function generate_code(string $prefix, $number)
{
    $date_prefix = date('my');
    $code = $prefix . $date_prefix . $number;

    return $code;
}