<?php
namespace apps\psych\controllers;


function create_psych_record($req) {
    $profile_id = $req->param("profile_id");
    //$profile = include __DIR__ . "/profile_fixture.php";
    if($req->method()=="GET"){
        \apps\utils\render_to_response('add_psych_details.html', __DIR__."/templates/", array(), array());
    } else {
        if($req->has_errors()){
            $values = addslashes(json_encode($req->all_posts()));
            $errors= json_encode($req->all_errors());
            \apps\utils\render_to_response('add_psych_details.html', __DIR__."/templates/", array("values"=>$values, "errors"=>$errors), array());
        } else {
            \apps\psych\models\create_psych_record($profile_id, $req->post("observation"), $req->post("action_points"));
            \merlin\utils\redirect(\merlin\urls\get_url_by_name("view_all_profiles", array()));
        }
    }
}

function get_all_psych_records($req) {
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    $records = \apps\psych\models\get_psych_record_for_id($req->param("profile_id"));

    if($req->urlconfig("return_data_type")=="json"){
        \apps\utils\json_response(array('profile'=>$profile, 'records'=>$records));
    }
    \apps\utils\render_to_response('psych_profile.html', __DIR__."/templates/", array(
        'profile' => $profile,
        'records' => $records
    ), array());

}