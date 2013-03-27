<?php
namespace apps\profile\urls;

function get_urls() {
    $patterns = array();

    $patterns["all/$"] = array(
        "controller"=>"\\apps\\profile\\controllers\\all_profile",
        "secure"=>true,
        "name"=>"view_all_profiles");

    $patterns["get/(?P<profile_id>[^/]+)/$"] = array(
        "controller"=>"\\apps\\profile\\controllers\\get_profile",
        "secure"=>true,
        "name"=>"get_profile");

    $patterns["get/(?P<profile_id>[^/]+)/json/$"] = array(
        "controller"=>"\\apps\\profile\\controllers\\get_profile",
        "secure"=>true,
        "return_data_type"=>"json",
        "name"=>"get_profile");

    $patterns["edit/(?P<profile_id>[^/]+)/$"] = array(
        "controller"=>"\\apps\\profile\\controllers\\edit_profile",
        "secure"=>true,
        "name"=>"edit_profile");

    $patterns["create/$"] = array(
        "controller"=>"\\apps\\profile\\controllers\\create_profile",
        "secure"=>true,
        "validation"=>"\\apps\\profile\\validation\\profile_validator",
        "name"=>"create_profile");

    $patterns["profile_form/$"] = array(
        "controller"=>"\\merlin\\generic\\controllers\\direct_file_response",
        "secure"=>true,
        "filename" => __DIR__ . "/profile_form.json",
        "additional_headers" => array("Content-type: application/json"),
        "name"=>"profile_form");

    return $patterns;
}