<?php
namespace apps\home\controllers;

function home($req) {    
    echo \apps\utils\render_to_response('page.html', __DIR__."/templates/", array(
        'users' => array(
            array(
                'username' =>           'peter',
                'tasks' => array('school', 'writing'),
                'user_id' =>            1,
            ),
            array(
                'username' =>           'anton',
                'tasks' => array('go shopping'),
                'user_id' =>            2,
            ),
            array(
                'username' =>           'john doe',
                'tasks' => array('write report', 'call tony', 'meeting with arron'),
                'user_id' =>            3
            ),
            array(
                'username' =>           'foobar',
                'tasks' => array(),
                'user_id' =>            4
            )
        )
    ), array());

}