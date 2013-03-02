<?php
namespace apps\profile\urls;

function get_urls() {
    $patterns = array();
    $patterns["get/(?P<profile_id>[^/]+)/$"] = array("controller"=>"\\apps\\profile\\controllers\\get_profile");
    $patterns["func2/$"] = array("controller"=>"\\apps\\bar\\controllers\\f2");
    return $patterns;
}