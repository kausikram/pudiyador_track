<?php
namespace apps\utils;

function render_to_response($template_name, $template_dir, $params, $settings) {
    $template = new \H2o($template_name, array(
        'searchpath' => array(__DIR__."/templates/", $template_dir),
        'cache_dir' => $template_dir
    ));
    $params["site_root"] = \merlin\config\get_config_item("base_uri_component");
    $params["media_root"] = \merlin\config\get_config_item("media_root");
    return $template->render($params);
}