<?php
function renderTemplate($path, $array) {
    if (file_exists($path)) {
        ob_start();  //Turn on buffering
        extract($array); //Import variables from array
        require_once($path);//Connect $path
        return ob_get_clean(); //Get current buffer
    }
    return "";
}

function format_t($test) {
    $other = ceil($test);
    if ($other >= 1000) {
        $other = number_format($test, 0, '', ' ');
    }
    $other .= ' <b class="rub">р</b>' ;
    return $other;
}

function searchUserByEmail($email, $users) {
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }
    return $result;
}
