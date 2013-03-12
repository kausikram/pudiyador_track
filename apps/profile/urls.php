<?php
namespace apps\profile\urls;

function get_urls() {
    $patterns = array();
    $patterns["all/$"] = array("controller"=>"\\apps\\profile\\controllers\\all_profile", "secure"=>true);
    $patterns["get/(?P<profile_id>[^/]+)/$"] = array("controller"=>"\\apps\\profile\\controllers\\get_profile", "secure"=>true);
    $patterns["create/$"] = array("controller"=>"\\apps\\profile\\controllers\\create_profile");
    return $patterns;
}