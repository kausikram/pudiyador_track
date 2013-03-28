<?php

namespace apps\health\models;

class ProfileHealth extends \ActiveRecord\Model {
    static $table_name = 'profile_health';
}


function create_health_record($profile_id, $properties){
    $cur_date = \date("Y-m-d");
    foreach($properties as $k=>$v){
        ProfileHealth::create(array("profile_id"=>$profile_id, "key"=>$k, "value"=>$v, "date"=>$cur_date));
    }
}

function get_health_record_for_id($id){
    $profile_health_properties = ProfileHealth::find('all', array('conditions' => array('profile_id = ?', $id), 'order' => 'date desc'));
    return $profile_health_properties;
}