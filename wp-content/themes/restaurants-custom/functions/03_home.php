<?php
$options = array(
    array("namePanel" => "トップページ情報の設定"),

    array("nameSection" => "スライドの設定", "link" => "/"),
    array(
        "name" => "number_slider",
        "label" => "スライド数の設定",
        "description" => "数を入力",
        "default" => 0,
        "type" => "number"
    ),
    array(
        "name" => "image_slider",
        "label" => "スライド%iの画像",
        "description" => "サイズを選択(980 x 460 px)",
        "default" => '',
        "repeat" => 'number_slider',
        "type" => "image"
    ),
    array(
        "name" => "link_slider",
        "label" => "スライド%iの画像URL",
        "description" => "URLを入力",
        "default" => '',
        "repeat" => 'number_slider',
        "type" => "text"
    ),
    array("nameSection" => "メインタイトルを設定", "link" => "/"),
    array(
        "name" => "title_h1",
        "label" => "大きなh1を設定します。タイトル",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "title_h2",
        "label" => "サブターゲットh2を設定します",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array("nameSection" => "ロゴアプリケーションリストの設定", "link" => "/"),
    array(
        "name" => "number_logo_app",
        "label" => "スライド数の設定",
        "description" => "数を入力",
        "default" => 0,
        "type" => "number"
    ),
    array(
        "name" => "logo_app",
        "label" => "スライドの画像％i",
        "description" => "サイズを選択(127 x 32 px)",
        "default" => '',
        "repeat" => 'number_logo_app',
        "type" => "image"
    ),
    array("nameSection" => "新しいタイトルを設定する", "link" => "/"),
    array(
        "name" => "title_new",
        "label" => "メインタイトルの設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "sub_title_new",
        "label" => "字幕を設定する",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "number_title",
        "label" => "タイトル数を設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "number"
    ),
    array(
        "name" => "item_title",
        "label" => "タイトルを選択",
        "description" => "それぞれのIDタイトルを入力してください",
        "default" => '',
        "repeat" => 'number_title',
        "type" => "text"
    ),
    array("nameSection" => "スケジュールタイトルの設定", "link" => "/"),
    array(
        "name" => "title_scheduled",
        "label" => "メインタイトルの設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "sub_title_scheduled",
        "label" => "字幕を設定する",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "number_scheduled",
        "label" => "タイトル数を設定",
        "description" => "数を入力",
        "default" => '',
        "type" => "number"
    ),
    array(
        "name" => "item_scheduled",
        "label" => "タイトルを選択",
        "description" => "",
        "default" => '',
        "repeat" => 'number_scheduled',
        "type" => "text"
    ),
    array("nameSection" => "ニュースの設定", "link" => "/"),
    array(
        "name" => "title_news",
        "label" => "メインタイトルの設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "sub_title_news",
        "label" => "字幕を設定する",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "number_news",
        "label" => "タイトル数を設定",
        "description" => "数を入力",
        "default" => '',
        "type" => "number"
    ),
    array(
        "name" => "news_item",
        "label" => "ニュースを選択",
        "description" => "数を入力",
        "default" => '',
        "repeat" => 'number_news',
        "type" => "text"
    ),
    array(
        "name" => "category_news",
        "label" => "カテゴリーIDを入力",
        "description" => "例：1,123,452",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "text_button_news",
        "label" => "ボタンのタイトル設定",
        "description" => "数を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "link_button_news",
        "label" => "ボタンのURLを入力",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),

);
$arrOpt = array_merge($arrOpt, $options);