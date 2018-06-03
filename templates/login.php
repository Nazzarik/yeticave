<?=$nav_cont;?>
<form class="form container" action="" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <?php $class_name = isset($errors['email']) ? "form__item--invalid" : "";
    $value = isset($form['email']) ? $form['email'] : ""; ?>

    <div class="form__item <?=$class_name;?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$value;?>">
        <span class="form__error"><?=$errors['email'];?></span>
    </div>
    <?php $class_name = isset($errors['password']) ? "form__item--invalid" : "";
    $value = isset($form['password']) ? $form['password'] : ""; ?>

    <div class="form__item form__item--last <?=$class_name;?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?=$value;?>">
        <span class="form__error"><?=$errors['password'];?></span>
    </div>
    <button type="submit" class="button">Войти</button>
</form>
