<?php
require_once ('functions.php');
require_once ('data.php');

$lot = null;

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    foreach ($lot_list as $item) {
        if ($item['id'] == $lot_id) {
            $lot = $item;
            break;
        }
    }
}

if (!$lot) {
//    http_response_code(404);
    header("Location: ./404.php");

}

$page_content = renderTemplate('templates/lot.php', [
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
