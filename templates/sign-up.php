<?=$nav_cont;?>

<form class="form container" action="" method="post"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>

    <?php $class_name = isset($errors['email']) ? "form__item--invalid" : "";
    $value = isset($form['email']) ? $form['email'] : ""; ?>
    <div class="form__item <?=$class_name;?>"> <!-- form__item--invalid -->
        <label for="email">E-mail*</label>
        <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=$value;?>">
        <span class="form__error"><?=$errors['email'];?></span>
    </div>

    <?php $class_name = isset($errors['password']) ? "form__item--invalid" : "";
    $value = isset($form['password']) ? $form['password'] : ""; ?>
    <div class="form__item <?=$class_name;?>">
        <label for="password">Пароль*</label>
        <input id="password" type="text" name="password" placeholder="Введите пароль" value="<?=$value;?>" >
        <span class="form__error"><?=$errors['password'];?></span>
    </div>

    <?php $class_name = isset($errors['name']) ? "form__item--invalid" : "";
    $value = isset($form['name']) ? $form['name'] : ""; ?>
    <div class="form__item <?=$class_name;?>">
        <label for="name">Имя*</label>
        <input id="name" type="text" name="name" placeholder="Введите имя" value="<?=$value;?>" >
        <span class="form__error"><?=$errors['name'];?></span>
    </div>

    <?php $class_name = isset($errors['contacts']) ? "form__item--invalid" : "";
    $value = isset($form['contacts']) ? $form['contacts'] : ""; ?>
    <div class="form__item <?=$class_name;?>">
        <label for="message">Контактные данные*</label>
        <textarea id="message" name="contacts" placeholder="Напишите как с вами связаться" ><?=$value;?></textarea>
        <span class="form__error"><?=$errors['contacts'];?></span>
    </div>
    <div class="form__item form__item--file form__item--last">
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="login.php">Уже есть аккаунт</a>
</form>
