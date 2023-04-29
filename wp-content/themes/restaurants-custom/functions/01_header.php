<?php
$options = array(
	array("namePanel" => "Setting Header"),

	array("nameSection" => "Header", "link" => "/"),
	array(
		"name" => "logo_header",
		"label" => "logo header",
		"description" => "select logo header size 100px x 100px",
		"default" => '',
		"type" => "image"
	),

);
$arrOpt = array_merge($arrOpt, $options);