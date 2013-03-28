<?php
namespace apps\health\urls;

function get_urls() {
    $patterns = array();

    $patterns["get/(?P<profile_id>[^/]+)/$"] = array(
        "controller"=>"\\apps\\health\\controllers\\get_all_health_records",
        "secure"=>true,
        "name"=>"get_all_health_records");

    $patterns["create/(?P<profile_id>[^/]+)/$"] = array(
        "controller"=>"\\apps\\health\\controllers\\create_health_record",
        "secure"=>true,
        //"validation"=>"\\apps\\profile\\validation\\health_validator",
        "name"=>"create_profile");

    $patterns["health_record_form/$"] = array(
        "controller"=>"\\merlin\\generic\\controllers\\direct_file_response",
        "secure"=>true,
        "filename" => __DIR__ . "/health_form.json",
        "additional_headers" => array("Content-type: application/json"),
        "name"=>"profile_form");

    return $patterns;
}