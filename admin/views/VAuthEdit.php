<div class="name___">Вы редактируете пользователя &#10077;<?=$auth['login']?>&#10078;</div>
<div class="create">
    <form method="post">
        <div class="row">
            <div class="col-md-4">логин:</div>
            <div class="col-md-4"><input type="text" name="login" value="<?=$auth['login']?>" required></div>
        </div>
        <div class="row">
            <div class="col-md-4">пароль:</div>
            <div class="col-md-4"><input type="text" name="password" value="<?=$_SESSION['password']?>" required></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="submit" value="Сохранить"></div>
        </div>
    </form>
</div>

