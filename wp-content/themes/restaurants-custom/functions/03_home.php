<?php
$options = array(
    array("namePanel" => "Setting home page"),

    array("nameSection" => "Home slider", "link" => "/"),
    array(
        "name" => "short_code_slider",
        "label" => "Short Code Slider",
        "description" => "[smartslider3 slider=2]",
        "default" => '',
        "type" => "text"
    ),
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
    array(
        "name" => "product_list_ids_saler",
        "label" => "product best saler ids",
        "description" => "insert number product best example: 123,546,6666",
        "default" => '4',
        "type" => "text"
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
    array("nameSection" => "Setting About us", "link" => "/"),
    array(
        "name" => "title_home_about_us",
        "label" => "Instert title",
        "description" => "",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "title_who_are_we",
        "label" => "Insert title who are we",
        "description" => "",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "content_about_us",
        "label" => "content about us",
        "description" => "insert content",
        "default" => '',
        "type" => "editor"
    ),
    array(
        "name" => "title_plant_meat",
        "label" => "Insert title plant meat",
        "description" => "",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "content_plant_meat",
        "label" => "content plant meat",
        "description" => "insert content",
        "default" => '',
        "type" => "editor"
    ),
    array("nameSection" => "Setting Contact us", "link" => "/"),
    array(
        "name" => "title_home_contact_us",
        "label" => "Instert title",
        "description" => "",
        "default" => '',
        "type" => "text"
    ),
    array(
        "name" => "short_code_contact_us",
        "label" => "Insert short code contact us",
        "description" => "",
        "default" => '',
        "type" => "text"
    ),
);
$arrOpt = array_merge($arrOpt, $options);