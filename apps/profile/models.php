<?php

namespace apps\profile\models;

class Profile extends \ActiveRecord\Model {
    static $table_name = 'profile';
}

class ProfileProperty extends \ActiveRecord\Model {
    static $table_name = 'profile_properties';
}


function get_profile_for_id($id){
    $profile = Profile::find($id);
    $profile_properties = ProfileProperty::find('all', array('conditions' => array('profile_id = ?', $id)));

    $profile_array = array();
        $profile_array["full_name"] = $profile->full_name;
        $profile_array["id"] = $profile->id;

    foreach($profile_properties as $prop){
        $profile_array[$prop->key] = $prop->value;
    }
    return $profile_array;
}

function get_all_profiles(){
    return Profile::all();
}