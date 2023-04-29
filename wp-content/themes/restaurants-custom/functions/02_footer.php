<?php
$options = array(
    array("namePanel" => "フッター情報の設定"),

    array("nameSection" => "フッタのロゴ設定", "link" => "/"),
    array(
        "name" => "logo_footer",
        "label" => "ロゴ設定",
        "description" => "サイズが238 x 40ピクセルの画像選択",
        "default" => '',
        "type" => "image"
    ),
    array("nameSection" => "2フッターのロゴを設定する", "link" => "/"),
    array(
        "name" => "logo_footer_2",
        "label" => "2ロゴの設定",
        "description" => "サイズが159 x 60ピクセルの画像選択",
        "default" => '',
        "type" => "image"
    ),
    array(
        "name" => "logo_footer_2_link",
        "label" => "ロゴ2の画像URL",
        "description" => "URLを入力",
        "default" => '',
        "type" => "text"
    ),
    array("nameSection" => "フッタ紹介内容の設定", "link" => "/"),
    array(
        "name" => "about_footer",
        "label" => "紹介の設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "editor"
    ),

);
$arrOpt = array_merge($arrOpt, $options);