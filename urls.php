<?php
namespace apps\urls;

function get_urls() {
    $patterns = array();
    $patterns["^/$"] = array("controller"=>"\\apps\\home\\controllers\\home");
    $patterns["home/"] = array("delegate"=>"\\apps\\home\\urls");
    $patterns["profile/"] = array("delegate"=>"\\apps\\profile\\urls");
    $patterns["health/"] = array("delegate"=>"\\apps\\health\\urls");
    $patterns["psych/"] = array("delegate"=>"\\apps\\psych\\urls");

    return $patterns;
}