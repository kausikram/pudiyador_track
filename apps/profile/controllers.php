<?php
namespace apps\profile\controllers;


function all_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profiles = \apps\profile\models\get_all_profiles();
    
    echo \apps\utils\render_to_response('profile_list.html', __DIR__."/templates/", array(
        'profiles' => $profiles,
    ), array());

}

function create_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    if($req->method()=="GET"){
        echo \apps\utils\render_to_response('page.html', __DIR__."/templates/", array(), array());
    } else {
        if($req->has_errors()){
            print "Hey there were errors on this form!!";
        } else {
            $props = $req->all_posts();
            unset($props["full_name"]);
            \apps\profile\models\create_profile($req->post("full_name"), $props);
            print "HEY i saved the data all is well";

        }
    }
}


function edit_profile($req) {
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    $values = json_encode($profile);
    if($req->method()=="GET"){
        echo \apps\utils\render_to_response('page.html', __DIR__."/templates/", array("values"=>$values), array());
    } else {
        if($req->has_errors()){
            print "Hey there were errors on this form!!";
        } else {
            $props = $req->all_posts();
            unset($props["full_name"]);
            \apps\profile\models\edit_profile($req->param("profile_id"), $req->post("full_name"), $props);
            print "HEY i saved the data all is well";

        }
    }
}

function get_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    
    echo \apps\utils\render_to_response('profile.html', __DIR__."/templates/", array(
        'profile' => $profile,
    ), array());

}