<?php

namespace apps\profile\validation;

function profile_validator() {
    $validator_sequence = array(
        "full_name" => array("\\merlin\\validators\\required","\\merlin\\validators\\integer_field"),
    );
    $result = array(
        "GET"  => array(),
        "POST" => $validator_sequence,
        "error_handling" => "pass" # can be "pass|response_json|response_xml|response_html"
    );
    return $result;
}
