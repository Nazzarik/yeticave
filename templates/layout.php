<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$title;?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <?=$header_cont;?>
</header>

<main <?=$main_class; ?>>
    <?=$content;?>
</main>

<footer class="main-footer">
    <?=$footer_cont;?>
</footer>

</body>
</html>
