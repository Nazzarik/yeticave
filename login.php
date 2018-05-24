<?php

require_once ('functions.php');
require_once ('config.php');
require_once ('data.php');
require_once ('userdata.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST;

    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $field) {
        if (empty($form[$field])) {
            $errors[$field] = 'Єто поле надо заполнить';
        }
    }

    if (!count($errors) and $user = searchUserByEmail($form['email'], $users)) {
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
        $page_cont = renderTemplate('templates/login.php', [
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
        $page_cont = renderTemplate('templates/lot.php', []);
    }
    else {
        $page_cont = renderTemplate('templates/login.php', []);
    }
}


$layout_cont = renderTemplate('templates/layout.php', [
    'title' => $title,
    'username' => $_SESSION['user']['name'],
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'content' => $page_cont,
    'category_arr' => $category_arr
]);

print($layout_cont);
