<?php
require_once ('functions.php');
require_once ('data.php');
session_start();


if (!isset($_SESSION['user'])) {
    header("Location: /");
//    http_response_code(404);
    exit();
}
else {
    $nav_cont = renderTemplate('templates/cat_list.php', []);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lot = $_POST;

        $required = ['lot-name', 'category', 'message', 'lot-rate', 'lot-step', 'lot-date'];
        $dict = [
            'lot-name' => 'Название',
            'category' => 'Категория',
            'message' => 'Описание',
            'lot-rate' => 'Старт-цена',
            'lot-step' => 'Шаг ставки',
            'lot-date' => 'Дата завершения'
        ];
        $errors = [];

        foreach ($_POST as $key => $value) {
            if (in_array($key, $required)) {
                if (!$value) {
                    $errors[$dict[$key]] = 'Єто поле надо заполнить';
                }
            }
        }

        if (isset($_FILES['photo_file'] ['name'])) {

            $tmp_name = $_FILES['photo_file']['tmp_name'];
            $path = $_FILES['photo_file']['name'];
//
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($finfo, $tmp_name);
//
            if ($file_type !== "image/jpeg") {
                $errors['Файл'] = 'Загрузите картинку в JPG формате!';
            } else {
                move_uploaded_file($tmp_name, 'img/' . $path);
                $lot['photo_file'] = $path;
            }
        } else {
            $errors['Файл'] = 'Вы не згрузили файл';
        }

        if (count($errors)) {
            $main_cont = renderTemplate('templates/add-lot.php', [
                'nav_cont' => $nav_cont,
                'lot' => $lot,
                'errors' => $errors
            ]);
        }else {
            $main_cont = renderTemplate('templates/lot.php', ['user' => $_SESSION['user'], 'lot' => $lot, 'nav_cont' => $nav_cont]);
        }

    }
    else {
        $main_cont = renderTemplate('templates/add-lot.php', [ 'nav_cont' => $nav_cont]);
    }

    $header_cont = renderTemplate('templates/header-common.php', ['user' => $_SESSION['user']]);
    $footer_cont = renderTemplate('templates/footer-common.php', ['nav_cont' => $nav_cont]);
    $layout_content = renderTemplate('templates/layout.php', [
        'title' => 'Добавление лота',
        'username' => $_SESSION['user']['name'],
        'header_cont' => $header_cont,
        'content' => $main_cont,
        'footer_cont' => $footer_cont,
        'category_arr' => $category_arr
    ]);

    print ($layout_content);
}
