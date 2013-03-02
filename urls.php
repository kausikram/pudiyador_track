<?php
namespace apps\urls;

function get_urls() {
    $patterns = array();
    $patterns["home/"] = array("delegate"=>"\\apps\\home\\urls");
    $patterns["profile/"] = array("delegate"=>"\\apps\\profile\\urls");

    $patterns["$"] = array("controller"=>"\\apps\\home\\controllers\\home");
    return $patterns;
}