<?php
$options = array(
	array("namePanel" => "Setting Header"),

	array("nameSection" => "Header logo", "link" => "/"),
	array(
		"name" => "logo_header",
		"label" => "logo header",
		"description" => "select logo header size 100px x 100px",
		"default" => '',
		"type" => "image"
	),

	array("nameSection" => "button order now", "link" => "/"),
	array(
		"name" => "title_order_now",
		"label" => "Title button order now",
		"description" => "insert title",
		"default" => '',
		"type" => "text"
	),
	array(
		"name" => "title_order_now_desc",
		"label" => "desc button order now",
		"description" => "insert content",
		"default" => '',
		"type" => "text"
	),
	array(
		"name" => "title_order_now_link",
		"label" => "link button order now",
		"description" => "insert link",
		"default" => '',
		"type" => "text"
	),
);
$arrOpt = array_merge($arrOpt, $options);