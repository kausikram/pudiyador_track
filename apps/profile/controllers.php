<?php
namespace apps\profile\controllers;


function all_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profiles = \apps\profile\models\get_all_profiles();
    
    \apps\utils\render_to_response('profile_list.html', __DIR__."/templates/", array(
        'profiles' => $profiles,
    ), array());

}

function create_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    if($req->method()=="GET"){
        \apps\utils\render_to_response('page.html', __DIR__."/templates/", array(), array());
    } else {
        if($req->has_errors()){
            $values = json_encode($req->all_posts());
            $errors= json_encode($req->all_errors());
            \apps\utils\render_to_response('page.html', __DIR__."/templates/", array("values"=>$values, "errors"=>$errors), array());
        } else {
            $props = $req->all_posts();
            unset($props["full_name"]);
            //\apps\profile\models\create_profile($req->post("full_name"), $props);
            print \merlin\urls\get_url_by_name("view_all_profiles", array());
            //\merlin\utils\redirect();
        }
    }
}


function edit_profile($req) {
    $profile_id = $req->param("profile_id");
    $profile = \apps\profile\models\get_profile_for_id($profile_id);
    $values = json_encode($profile);
    if($req->method()=="GET"){
        \apps\utils\render_to_response('page.html', __DIR__."/templates/", array("values"=>$values), array());
    } else {
        if($req->has_errors()){
            print "Hey there were errors on this form!!";
        } else {
            $props = $req->all_posts();
            unset($props["full_name"]);
            \apps\profile\models\edit_profile($profile_id, $req->post("full_name"), $props);
            \merlin\utils\redirect(\merlin\urls\get_url_by_name("view_all_profiles", array()));
        }
    }
}

function get_profile($req) {
    //$profile = include __DIR__ . "/profile_fixture.php";
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    if($req->urlconfig("return_data_type")=="json"){
        \apps\utils\json_response(array('profile'=>$profile));
    }
    \apps\utils\render_to_response('profile.html', __DIR__."/templates/", array(
        'profile' => $profile,
    ), array());

}