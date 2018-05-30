<?php
//Вопрос:
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить этого пользователя?</div>
    <form method='post'>
        <label>Да<button name='answer' hidden></button></label>
    </form>
    <a href='?page=authList'>Отмена</a>
</div>";

//Если админ действительно хочет удалить этого пользователя, то
if ($_POST['answer'])
{
    // вызываем метод удаления пользователя
    $vcreateeditauth->deleteOneAuth($_GET['deleteAuth']);
    // и возвращаемся обратно(на authList)
    header( 'Location: http://localhost/my_project/admin/?page=authList' );
}
