<?php

date_default_timezone_set("Europe/Kiev");
$ts = time();
$end_ts = strtotime('tomorrow');
$curtime = $end_ts - $ts;
$hrs = floor($curtime / 3600);
$min = floor(($curtime % 3600) /60);
$remaining = $hrs.":".$min;


$title = "YetiCave";

//$is_auth = (bool) rand(0, 1);
//$user_name = 'Константин';
//$user_avatar = 'img/user.jpg';

//$category_arr = [
//    [
//        'id' => '1',
//        'name' => 'Доски и лыжи'
//    ],
//    [
//        'id' => '2',
//        'name' => 'Крепления'
//    ],
//    [
//        'id' => '3',
//        'name' => 'Ботинки'
//    ],
//    [
//        'id' => '4',
//        'name' => 'Одежда'
//    ],
//    [
//        'id' => '5',
//        'name' => 'Инструменты'
//    ],
//    [
//        'id' => '6',
//        'name' => 'Разное'
//    ],
//];


$lot_list = [
    [
        'id' => '1',
        'lot-name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'lot-rate' => '10999',
        'lot-step' => '12 000',
        'lot-date' => $remaining,
        'photo_file' => 'lot-1.jpg',
        'message' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами.'
    ],
    [
        'id' => '2',
        'lot-name' => 'DC Play Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'lot-rate' => '159999',
        'lot-step' => '12 000',
        'lot-date' => $remaining,
        'photo_file' => 'lot-image.jpg',
        'message' => 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.'
    ],
    [
        'id' => '3',
        'lot-name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'lot-rate' => '8000',
        'lot-step' => '12 000',
        'lot-date' => $remaining,
        'photo_file' => 'lot-3.jpg',
        'message' => 'Еще один лот для теста =)'
    ],
    [
        'id' => '4',
        'lot-name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'lot-rate' => '10999',
        'lot-step' => '12 000',
        'lot-date' => $remaining,
        'photo_file' => 'lot-4.jpg',
        'message' => 'Тест =)'
    ],
    [
        'id' => '5',
        'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'lot-rate' => '7500',
        'lot-step' => '12 000',
        'lot-date' => $remaining,
        'photo_file' => 'lot-5.jpg',
        'message' => 'Тестовый лот №5'
    ],
    [
        'id' => '6',
        'lot-name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'lot-rate' => '5400',
        'lot-step' => '12 000',
        'lot-date' => $remaining,
        'photo_file' => 'lot-6.jpg',
        'message' => 'Еще один лот для теста =) №6'
    ]
];
