<?php
//Вопрос:
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить это меню?</div>
    <form method='post'>
        <label>Да<button name='answer' value='true' hidden></button></label>
    </form>
    <a href='?page=menuList'>Отмена</a>
</div>";

//Если пользователь действительно хочет удалить это меню, то
if ($_POST['answer'])
{
    // возвращаемся обратно(на menuList)
    header( 'Location: http://localhost/my_project/admin/?page=menuList' );
    // и вызываем метод удаления меню
    $vcreateeditmenu->deleteMenu($_GET['deleteMenu']);
}