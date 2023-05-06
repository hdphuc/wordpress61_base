<?php
$options = array(
    array("namePanel" => "Setting home page"),

    // array("nameSection" => "Home slider", "link" => "/"),
    // array(
    //     "name" => "number_slider",
    //     "label" => "スライド数の設定",
    //     "description" => "数を入力",
    //     "default" => 0,
    //     "type" => "number"
    // ),
    // array(
    //     "name" => "image_slider",
    //     "label" => "スライド%iの画像",
    //     "description" => "サイズを選択(980 x 460 px)",
    //     "default" => '',
    //     "repeat" => 'number_slider',
    //     "type" => "image"
    // ),
    // array(
    //     "name" => "link_slider",
    //     "label" => "スライド%iの画像URL",
    //     "description" => "URLを入力",
    //     "default" => '',
    //     "repeat" => 'number_slider',
    //     "type" => "text"
    // ),
    array("nameSection" => "Home block banner 1", "link" => "/"),
    array(
        "name" => "home_banner_img_1",
        "label" => "home banner image",
        "description" => "select home banner image size 1280px x 300px",
        "default" => '',
        "type" => "image"
    ),
    array(
        "name" => "home_banner_link_1",
        "label" => "Link for image 1",
        "description" => "insert link redirect",
        "default" => '#',
        "type" => "text"
    ),
    array("nameSection" => "Home block product best saler", "link" => "/"),
    array(
        "name" => "title_block_product_best_sale",
        "label" => "Title block product best saler",
        "description" => "title block product best",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "description_block_product_best_sale",
        "label" => "Description block product best saler",
        "description" => "",
        "default" => '',
        "type" => "textarea"
    ),
    array(
        "name" => "number_product_best_sale",
        "label" => "Number product best saler",
        "description" => "insert number product best example: 4",
        "default" => '4',
        "type" => "number"
    ),
    array("nameSection" => "Home block banner 2", "link" => "/"),
    array(
        "name" => "home_banner_img_2",
        "label" => "home banner image",
        "description" => "select home banner image size 1280px x 300px",
        "default" => '',
        "type" => "image"
    ),
    array(
        "name" => "home_banner_link_2",
        "label" => "Link for image 2",
        "description" => "insert link redirect",
        "default" => '#',
        "type" => "text"
    ),
    array("nameSection" => "Home block products list", "link" => "/"),
    array(
        "name" => "title_block_product_list",
        "label" => "Title block product list",
        "description" => "insert Content",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "description_block_product_list",
        "label" => "Description block product list",
        "description" => "insert Content",
        "default" => '',
        "type" => "textarea"
    ),
    array(
        "name" => "number_product_list",
        "label" => "Number product list",
        "description" => "insert number product list example: 4",
        "default" => '',
        "type" => "number"
    ),
    array(
        "name" => "product_list_ids",
        "label" => "Product list ids",
        "description" => "insert product list ids example: 1,2,3,4",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "catgory_product_list",
        "label" => "Catgory product list",
        "description" => "insert catgory product list example: 1,2,3,4",
        "default" => '',
        "type" => "text"
    ),
//     array("nameSection" => "スケジュールタイトルの設定", "link" => "/"),
//     array(
//         "name" => "title_scheduled",
//         "label" => "メインタイトルの設定",
//         "description" => "内容を入力",
//         "default" => '',
//         "type" => "text"
//     ),
//     array(
//         "name" => "sub_title_scheduled",
//         "label" => "字幕を設定する",
//         "description" => "内容を入力",
//         "default" => '',
//         "type" => "text"
//     ),
//     array(
//         "name" => "number_scheduled",
//         "label" => "タイトル数を設定",
//         "description" => "数を入力",
//         "default" => '',
//         "type" => "number"
//     ),
//     array(
//         "name" => "item_scheduled",
//         "label" => "タイトルを選択",
//         "description" => "",
//         "default" => '',
//         "repeat" => 'number_scheduled',
//         "type" => "text"
//     ),
//     array("nameSection" => "ニュースの設定", "link" => "/"),
//     array(
//         "name" => "title_news",
//         "label" => "メインタイトルの設定",
//         "description" => "内容を入力",
//         "default" => '',
//         "type" => "text"
//     ),
//     array(
//         "name" => "sub_title_news",
//         "label" => "字幕を設定する",
//         "description" => "内容を入力",
//         "default" => '',
//         "type" => "text"
//     ),
//     array(
//         "name" => "number_news",
//         "label" => "タイトル数を設定",
//         "description" => "数を入力",
//         "default" => '',
//         "type" => "number"
//     ),
//     array(
//         "name" => "news_item",
//         "label" => "ニュースを選択",
//         "description" => "数を入力",
//         "default" => '',
//         "repeat" => 'number_news',
//         "type" => "text"
//     ),
//     array(
//         "name" => "category_news",
//         "label" => "カテゴリーIDを入力",
//         "description" => "例：1,123,452",
//         "default" => '',
//         "type" => "text"
//     ),
//     array(
//         "name" => "text_button_news",
//         "label" => "ボタンのタイトル設定",
//         "description" => "数を入力",
//         "default" => '',
//         "type" => "text"
//     ),
//     array(
//         "name" => "link_button_news",
//         "label" => "ボタンのURLを入力",
//         "description" => "内容を入力",
//         "default" => '',
//         "type" => "text"
//     ),

);
$arrOpt = array_merge($arrOpt, $options);