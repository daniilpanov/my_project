<?php
//Вопрос:
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить это меню?</div>
    <a href='?deleteMenu={$_GET['deleteMenu']}&true=true'>Да</a>
    <a href='?deleteMenu={$_GET['deleteMenu']}&false=false'>Отмена</a>
</div>";

//Если пользователь действительно хочет удалить это меню, то
if ($_GET['deleteMenu'] && $_GET['true'] == 'true')
{
    // возвращаемся обратно(на menuList)
    header( 'Refresh: 1; url=http://localhost/my_project/admin/?page=menuList' );
    // и вызываем метод удаления меню
    $vcreateeditmenu->deleteMenu($_GET['deleteMenu']);
}
//Иначе:
elseif ($_GET['deleteMenu'] && $_GET['false'] == 'false')
{
    // небольшой скрипт
    ?>
    <script>
        alert('Удаление отменено');
    </script>
    <?php
    // и возврат на menuList
    header( 'Refresh: 1; url=http://localhost/my_project/admin/?page=menuList' );
}