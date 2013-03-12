<?php

namespace apps\profile\models;

class Profile extends \ActiveRecord\Model {
    static $table_name = 'profile';
}

class ProfileProperty extends \ActiveRecord\Model {
    static $table_name = 'profile_properties';
}


function create_profile($full_name, $properties){
    $profile = Profile::create(array("full_name"=>$full_name));
    $profile_id = $profile->id;
    foreach($properties as $k=>$v){
        ProfileProperty::create(array("profile_id"=>$profile_id, "key"=>$k, "value"=>$v));
    }
}

function edit_profile($id, $full_name, $properties){
    $profile = Profile::find($id);
    if($profile->full_name != $full_name){
        $profile->full_name = $full_name;
        $profile->save();
    }
    $profile_properties = ProfileProperty::find('all', array('conditions' => array('profile_id = ?', $id)));
    foreach($profile_properties as $prop){
        if($prop->value != $properties[$prop->key]){
            $prop->value = $properties[$prop->key];
            $prop->save();
        }
    }
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