<?php
require_once ('functions.php');
require_once ('data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $lot = $_POST;
  $required = ['title', 'description'];
  $dict = ['title' => 'Название', 'description' => 'Описание'];
  $errors = [];

  foreach ($_POST as $key => $value) {
      if (in_array($key, $required)) {
          if (!$value) {
              $errors[$dict[$key]] = 'Єто поле надо заполнить';
          }
      }
  }

  if (isset($_FILES['photo_file']['name'])) {
      $path = $_FILES['photo_file']['name'];

      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      $file_type = finfo_file($finfo, $path);
      if ($file_type !== "image/jpg") {
          $errors['Файл'] = 'Загрузите картинку в JPG формате!';
      } else {
          $res = move_uploaded_file($_FILES['photo_file']['tmp_name'], 'img/' . $path);
          $lot['photo_file'] = $path;
//          move_uploaded_file($tmp_name, 'img/' . $path);
      }
  }else {
      $errors['Файл'] = 'Вы не згрузили файл';
  }

  if (count($errors)) {
      $page_content = renderTemplate('templates/add-lot.php', [
          'lot' => $lot,
          'errors' => $errors
      ]);
  }else {
      $page_content = renderTemplate('templates/lot.php', ['lot' => $lot]);
  }

 /* if (isset($path)) {
      $lot['photo_file'] = $path;
  } */

}else {
    $page_content = renderTemplate('templates/add-lot.php', []);
}

$layout_content = renderTemplate('templates/layout.php', [
    'title' => 'Добавление лота',
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'user_avatar' => $user_avatar,
    'content' => $page_content,
    'category_arr' => $category_arr
]);

print ($layout_content);
