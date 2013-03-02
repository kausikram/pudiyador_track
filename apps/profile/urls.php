<?php
namespace apps\profile\urls;

function get_urls() {
    $patterns = array();
    $patterns["get/(?P<profile_id>[^/]+)/$"] = array("controller"=>"\\apps\\profile\\controllers\\get_profile");
    $patterns["all/$"] = array("controller"=>"\\apps\\profile\\controllers\\all_profile");
    return $patterns;
}