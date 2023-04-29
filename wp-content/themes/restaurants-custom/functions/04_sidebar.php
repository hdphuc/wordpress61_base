<?php
$options = array(
    array("namePanel" => "サイドバーの情報設定"),

    array("nameSection" => "タイトルのランキング設定", "link" => "/"),
    array(
        "name" => "title_rank",
        "label" => "メインタイトルの設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "sub_title_rank",
        "label" => "字幕を設定する",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "number_rank_title",
        "label" => "タイトル数を設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "number"
    ),
    array(
        "name" => "item_rank_title",
        "label" => "タイトルを選択",
        "description" => "それぞれのIDタイトルを入力してください",
        "default" => '',
        "repeat" => 'number_rank_title',
        "type" => "text"
    ),
    array("nameSection" => "Twitterの設定", "link" => "/"),
    array(
        "name" => "twitter_link",
        "label" => "Twitter投稿URLの設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),

    array("nameSection" => "問い合わせの設定", "link" => "/"),
    array(
        "name" => "contact_text",
        "label" => "問い合わせのタイトル設定",
        "description" => "内容を入力",
        "default" => '',
        "type" => "text"
    ),

    array(
        "name" => "contact_link",
        "label" => "問い合わせのURL設定",
        "description" => "URLを入力",
        "default" => '',
        "type" => "text"
    ),

);
$arrOpt = array_merge($arrOpt, $options);