<?php
namespace apps\home\controllers;

function home($req) {    
    echo \apps\utils\render_to_response('page.html', __DIR__."/templates/", array(), array());

}

function logout($req) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
}