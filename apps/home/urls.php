<?php
namespace apps\home\urls;

function get_urls() {
    $patterns = array();
    $patterns["$"] = array("controller"=>"\\apps\\home\\controllers\\home");
    return $patterns;
}