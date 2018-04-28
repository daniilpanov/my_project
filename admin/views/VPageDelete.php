<?php
//Вопрос:
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить эту страницу?</div>
    <a href='?deletePage={$_GET['deletePage']}&true=true'>Да</a>
    <a href='?deletePage={$_GET['deletePage']}&false=false'>Отмена</a>
</div>";

//Если пользователь действительно хочет удалить эту страницу, то
if ($_GET['deletePage'] && $_GET['true'] == 'true')
{
    // возвращаемся обратно(на pageList)
    header( 'Refresh: 1; url=http://localhost/my_project/admin/?page=pageList' );
    // и вызываем метод удаления странички
    $vcreateeditpage->deletePage($_GET['deletePage']);
}
//Иначе:
elseif ($_GET['deletePage'] && $_GET['false'] == 'false')
{
    // небольшой скрипт
    ?>
    <script>
        alert('Удаление отменено');
    </script>
    <?php
    // и возврат на menuList
    header( 'Refresh: 1; url=http://localhost/my_project/admin/?page=pageList' );
}