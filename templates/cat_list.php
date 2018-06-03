<nav class="nav">
    <ul class="nav__list container">
    <?php foreach ($categories as $cat) : ?>
        <li class="nav__item">
            <a href="index.php?cat_id=<?=$cat['id'];?>"><?=$cat['category']?></a>
        </li>
    <?php endforeach;?>
    </ul>
</nav>
