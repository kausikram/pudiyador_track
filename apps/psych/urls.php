<?php
namespace apps\psych\urls;

function get_urls() {
    $patterns = array();

    $patterns["get/(?P<profile_id>[^/]+)/$"] = array(
        "controller"=>"\\apps\\psych\\controllers\\get_all_psych_records",
        "secure"=>true,
        "name"=>"get_all_psych_records");

    $patterns["create/(?P<profile_id>[^/]+)/$"] = array(
        "controller"=>"\\apps\\psych\\controllers\\create_psych_record",
        "secure"=>true,
        //"validation"=>"\\apps\\profile\\validation\\health_validator",
        "name"=>"create_psych_record");

    $patterns["psych_record_form/$"] = array(
        "controller"=>"\\merlin\\generic\\controllers\\direct_file_response",
        "secure"=>true,
        "filename" => __DIR__ . "/psych_form.json",
        "additional_headers" => array("Content-type: application/json"),
        "name"=>"psych_form");

    return $patterns;
}