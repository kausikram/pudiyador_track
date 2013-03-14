<?php

$config = array();

$config["base_uri_component"] = "http://localhost/pudiyador_track/index.php"; #No Trailing Slashes
$config["base_url_namespace"] = "\\apps\\urls";

$config["media_root"] = "/pudiyador_track/media";

$config["middlewares"]= array(
    "\\merlin\\middlewares\\basic_auth_middleware" # Ensure you set the basic auth usernames and its md5ed passwords below
    //"\merlin\\middlewares\\validation"
);

$config["404_page"] = __DIR__."/apps/utils/templates/404_page.html";

