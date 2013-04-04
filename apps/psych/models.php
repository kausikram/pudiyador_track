<?php

namespace apps\psych\models;

class ProfilePsych extends \ActiveRecord\Model {
    static $table_name = 'profile_psych';
}


function create_psych_record($profile_id, $observation, $action_points){
    $cur_date = \date("Y-m-d");
    ProfilePsych::create(array(
                              "profile_id"=>$profile_id,
                              "observation"=>$observation,
                              "action_points"=>$action_points,
                              "date"=>$cur_date));

}

function get_psych_record_for_id($id){
    $profile_psych_properties = ProfilePsych::find('all', array(
                                                                'conditions' => array('profile_id = ?', $id),
                                                                'order' => 'date desc'));
    return $profile_psych_properties;
}