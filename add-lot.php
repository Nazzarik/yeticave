<?php
require_once ('functions.php');
require_once ('data.php');


$page_content = renderTemplate('templates/add-lot.php', [
    'lot' => $lot,
    'lot_time_remaining' => $remaining
]);
$layout_content = renderTemplate('templates/layout.php', [
    'title' => $title,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category_arr' => $category_arr
]);

print ($layout_content);
