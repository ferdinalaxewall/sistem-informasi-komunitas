<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function set_active($uri_segment, $segment_number = 2, $class = 'active') {
    $CI =& get_instance();
    $current_segment = $CI->uri->segment($segment_number); 
    return ($current_segment == $uri_segment) ? $class : '';
}