<?php
namespace apps\health\controllers;


function create_health_record($req) {
    $profile_id = $req->param("profile_id");
    //$profile = include __DIR__ . "/profile_fixture.php";
    if($req->method()=="GET"){
        \apps\utils\render_to_response('add_health_details.html', __DIR__."/templates/", array(), array());
    } else {
        if($req->has_errors()){
            $values = addslashes(json_encode($req->all_posts()));
            $errors= json_encode($req->all_errors());
            \apps\utils\render_to_response('add_health_details.html', __DIR__."/templates/", array("values"=>$values, "errors"=>$errors), array());
        } else {
            $props = $req->all_posts();
            \apps\health\models\create_health_record($profile_id, $props);
            \merlin\utils\redirect(\merlin\urls\get_url_by_name("view_all_profiles", array()));
        }
    }
}

function get_all_health_records($req) {
    $profile = \apps\profile\models\get_profile_for_id($req->param("profile_id"));
    $records = \apps\health\models\get_health_record_for_id($req->param("profile_id"));

    $grouped_record = array();
    foreach ($records as $record) {
        $date = \date_format($record->date, "d M, Y");
        if (isset($grouped_record[$date])) {
             $grouped_record[$date][] = $record;
        } else {
             $grouped_record[$date] = array($record);
        }
    }
    $ordered_record = array();
    foreach ($grouped_record as $k=>$v) {
        $ordered_record[] =array("date"=>$k, "records"=>$v);
    }

    if($req->urlconfig("return_data_type")=="json"){
        \apps\utils\json_response(array('profile'=>$profile, 'records'=>$ordered_record));
    }
    \apps\utils\render_to_response('health_profile.html', __DIR__."/templates/", array(
        'profile' => $profile,
        'records' => $ordered_record
    ), array());

}