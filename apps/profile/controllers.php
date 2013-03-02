<?php
namespace apps\profile\controllers;

function get_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    
    echo \apps\utils\render_to_response('profile.html', __DIR__."/templates/", array(
        'profile' => $profile,
    ), array());

}