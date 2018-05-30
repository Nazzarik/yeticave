<?php

require_once ('functions.php');
require_once ('config.php');
require_once ('data.php');

session_start();


$nav_cont = renderTemplate('templates/cat_list.php', []);

$header_cont = renderTemplate('templates/header-common.php', ['user' => $_SESSION['user']]);
$main_cont = renderTemplate('templates/index.php', ['lot_list' => $lot_list, 'lot_time_remaining' => $remaining]);
$footer_cont = renderTemplate('templates/footer-common.php', ['nav_cont' => $nav_cont]);

$layout_cont = renderTemplate('templates/layout.php', [
    'title' => $title,
    'main_class' => 'class="container"',
    'header_cont' => $header_cont,
    'content' => $main_cont,
    'footer_cont' => $footer_cont,
    'category_arr' => $category_arr
]);

print($layout_cont);
