<?php
$options = array(
    array("namePanel" => "Setting footer"),

    array("nameSection" => "Logo", "link" => "/"),
    array(
        "name" => "logo_footer",
        "label" => "logo",
        "description" => "select logo footer size 100px x 100px",
        "default" => '',
        "type" => "image"
    ),
    array("nameSection" => "Setting socical", "link" => "/"),
    array(
        "name" => "facebook_link",
        "label" => "facebook link",
        "description" => "Insert Facebook link",
        "default" => '#',
        "type" => "text"
    ),
    array(
        "name" => "instagram_link",
        "label" => "instagram link",
        "description" => "Insert instagram link",
        "default" => '#',
        "type" => "text"
    ),
    array(
        "name" => "tiktok_link",
        "label" => "tiktok link",
        "description" => "Insert tiktok link",
        "default" => '#',
        "type" => "text"
    ),
);
$arrOpt = array_merge($arrOpt, $options);