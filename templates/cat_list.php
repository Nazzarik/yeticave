<nav class="nav">
    <ul class="nav__list container">
    <?php foreach ($categories as $cat) : ?>
        <li class="nav__item">
            <a href="index.php?cat_id=<?=$cat['id'];?>"><?=$cat['name']?></a>
        </li>
    <?php endforeach;?>
    </ul>
</nav>

<!--<nav class="nav">-->
<!--    <ul class="nav__list container">-->
<!--        <li class="nav__item">-->
<!--            <a href="all-lots.html">Доски и лыжи</a>-->
<!--        </li>-->
<!--        <li class="nav__item">-->
<!--            <a href="all-lots.html">Крепления</a>-->
<!--        </li>-->
<!--        <li class="nav__item">-->
<!--            <a href="all-lots.html">Ботинки</a>-->
<!--        </li>-->
<!--        <li class="nav__item">-->
<!--            <a href="all-lots.html">Одежда</a>-->
<!--        </li>-->
<!--        <li class="nav__item">-->
<!--            <a href="all-lots.html">Инструменты</a>-->
<!--        </li>-->
<!--        <li class="nav__item">-->
<!--            <a href="all-lots.html">Разное</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</nav>-->
