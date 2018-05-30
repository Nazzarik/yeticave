<?php

require_once ('functions.php');
require_once ('config.php');
require_once ('data.php');
require_once ('userdata.php');

session_start();

$nav_cont = renderTemplate('templates/cat_list.php', []);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $field) {
        if (empty($form[$field])) {
            $errors[$field] = 'Єто поле надо заполнить';
        }
    }
    if (!count($errors) and $user =  searchUserByEmail($form['email'], $users)) {
        if (password_verify($form['password'], $user['password'])) {
            $_SESSION['user'] = $user;
        }
        else {
            $errors['password'] = 'Неверный пароль';
        }
    }
    else {
        $errors['email'] = 'Такой пользователь не найден';
    }

    if (count($errors)) {
        $main_cont = renderTemplate('templates/login.php', [
            'nav_cont' => $nav_cont,
            'form' => $form,
            'errors' => $errors
        ]);
    }
    else {
        header("Location: /yeticave/index.php");
        exit();
    }
}
else {
    if (isset($_SESSION['user'])) {
        $main_cont = renderTemplate('templates/lot.php', []);
    }
    else {
        $main_cont = renderTemplate('templates/login.php', ['nav_cont' => $nav_cont]);
    }
}

$header_cont = renderTemplate('templates/header-common.php', ['user' => $_SESSION['user']]);
$footer_cont = renderTemplate('templates/footer-common.php', ['nav_cont' => $nav_cont]);
$layout_cont = renderTemplate('templates/layout.php', [
    'title' => $title,
    'header_cont' => $header_cont,
    'content' => $main_cont,
    'footer_cont' => $footer_cont,
    'category_arr' => $category_arr,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
]);

print($layout_cont);
