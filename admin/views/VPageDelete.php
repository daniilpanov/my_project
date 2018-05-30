<?php
//Вопрос:
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить эту страницу?</div>
    <form method='post'>
        <label>Да<button name='answer' value='true' hidden></button></label>
    </form>
    <a href='?page=pageList'>Отмена</a>
</div>";

//Если пользователь действительно хочет удалить эту страницу, то
if ($_POST['answer'])
{
    // возвращаемся обратно(на pageList)
    header( 'Location: http://localhost/my_project/admin/?page=pageList' );
    // и вызываем метод удаления странички
    $vcreateeditpage->deletePage($_GET['deletePage']);
}