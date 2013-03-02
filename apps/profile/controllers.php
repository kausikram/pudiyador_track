<?php
namespace apps\profile\controllers;


function all_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profiles = \apps\profile\models\get_all_profiles();
    
    echo \apps\utils\render_to_response('profile_list.html', __DIR__."/templates/", array(
        'profiles' => $profiles,
    ), array());

}

function get_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    
    echo \apps\utils\render_to_response('profile.html', __DIR__."/templates/", array(
        'profile' => $profile,
    ), array());

}