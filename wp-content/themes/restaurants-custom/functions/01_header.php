<?php
$options = array(
	array("namePanel" => "ヘッダー情報の設定"),

	array("nameSection" => "ロゴ設定", "link" => "/"),
	array(
		"name" => "logo_header",
		"label" => "ロゴ設定",
		"description" => "サイズが250x36ピクセルの画像選択",
		"default" => '',
		"type" => "image"
	),
	array(
		"name" => "logo_menu_mobile",
		"label" => "ロゴメニューモバイル",
		"description" => "サイズが235x30ピクセルの画像選択",
		"default" => '',
		"type" => "image"
	),

);
$arrOpt = array_merge($arrOpt, $options);