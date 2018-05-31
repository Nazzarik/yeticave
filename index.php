<?php

require_once ('functions.php');
require_once ('config.php');
require_once ('data.php');
require_once ('init.php');

session_start();

$nav_cont = renderTemplate('templates/cat_list.php', ['categories' => $category_arr]);
$header_cont = renderTemplate('templates/header-common.php', ['user' => $_SESSION['user']]);

if (!$link) {
    $error = mysqli_connect_error();
    $main_cont = renderTemplate('templates/error.php', ['error' => $error]);
}
else {
    $sql = 'SELECT `ID`, `name` FROM categories';
    $result = mysqli_query($link, $sql);
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_error($link);
        $content = renderTemplate('templates/error.php', ['error' => $error]);
    }

    $main_cont = renderTemplate('templates/index.php', ['lot_list' => $lot_list, 'lot_time_remaining' => $remaining]);

}



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
