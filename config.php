<?php

$config = array();

$config["base_uri_component"] = "http://localhost/pudiyador_track/index.php"; #No Trailing Slashes
$config["base_url_namespace"] = "\\apps\\urls";

$config["media_root"] = "/pudiyador_track/media";

$config["middlewares"]= array(
    #"\\merlin\\middlewares\\session_middleware",  #Loads session variables
    "\\merlin\\middlewares\\basic_auth_middleware", # Ensure you set the basic auth usernames and its SHA11es passwords below
    "\\merlin\\middlewares\\validation_middleware"
);

$config["basic_auth_pairs"] = array("admin"=>"123vsdof23534-486bf52e1fa435d039e8364b206d1496635c8145");
$config["404_page"] = __DIR__."/apps/utils/templates/404_page.html";

