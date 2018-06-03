<?php
require_once ('functions.php');
require_once ('data.php');
require_once ('config.php');
require_once ('userdata.php');

session_start();

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
$nav_cont = renderTemplate('templates/cat_list.php', []);
$header_cont = renderTemplate('templates/header-common.php', ['user' => $_SESSION['user']]);

$main_cont = renderTemplate('templates/lot.php', [
    'nav_cont' => $nav_cont,
    'lot' => $lot,
    'lot_time_remaining' => $remaining,
    'cookie' => $baba
]);
$footer_cont = renderTemplate('templates/footer-common.php', ['nav_cont' => $nav_cont]);


$layout_content = renderTemplate('templates/layout.php', [
    'title' => $title,
    'username' => $_SESSION['user']['name'],
    'header_cont' => $header_cont,
    'content' => $main_cont,
    'footer_cont' => $footer_cont,
    'category_arr' => $category_arr
]);

print ($layout_content);

