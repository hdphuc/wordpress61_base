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

	array("nameSection" => "button Sign-in", "link" => "/"),
	array(
		"name" => "show_btn_sign_in",
		"label" => "Show hide button sign in",
		"description" => "",
		"default" => '',
		"type" => "checkbox"
	),
	array(
		"name" => "title_btn_sign_in",
		"label" => "Title button sign in",
		"description" => "",
		"default" => '',
		"type" => "text"
	),

	array("nameSection" => "button register", "link" => "/"),
	array(
		"name" => "show_btn_register",
		"label" => "Show hide button register",
		"description" => "",
		"default" => '',
		"type" => "checkbox"
	),
	array(
		"name" => "title_btn_register",
		"label" => "Title button register",
		"description" => "",
		"default" => '',
		"type" => "text"
	),
	array(
		"name" => "short_code_register",
		"label" => "Short code form register",
		"description" => "",
		"default" => '',
		"type" => "text"
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