<?php
require_once ('functions.php');
require_once ('data.php');

$lot = null;

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    $cook_name = 'cookies';
    $cook_val = $lot_id;
    $cook_expire = strtotime("+30 days");
    $cook_path = "/";
    if (isset($_COOKIE['cookies'])) {
        $decoding = json_encode($cook_val);

        $baba = array_push($decoding, $cook_val);
//        return($baba);
//        foreach ( $decoding as $value) {
//            $baba = $value;
//        }
//        $cook_val = $_COOKIE['cookies'];
//        $encoding = json_encode($decoding[]);
    }

    setcookie($cook_name, $baba, $cook_expire, $cook_path);


    foreach ($lot_list as $item) {
        if ($item['id'] == $lot_id) {
            $lot = $item;
            break;
        }
    }
}

if (!$lot) {
    http_response_code(404);
//    header("Location: ./404.php");

}

$page_content = renderTemplate('templates/lot.php', [
    'lot' => $lot,
    'lot_time_remaining' => $remaining,
    'cookie' => $baba
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

