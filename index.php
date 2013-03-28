<?php
#pass
require("resources/merlin/merlin/merlin.php");
require ("resources/water/h2o.php");

define('PHP_ACTIVERECORD_AUTOLOAD_DISABLE',true);
require ("resources/activerecord/ActiveRecord.php");


ActiveRecord\Config::initialize(function($cfg) {
    $cfg->set_connections(array(
    'development' => 'mysql://root:@localhost/pudiyador_track'));
});

require( "urls.php");
require("apps/utils/init.php");
require("apps/home/init.php");
require("apps/profile/init.php");
require("apps/health/init.php");

$config_file_path = __DIR__ . "/config.php";

start($config_file_path);