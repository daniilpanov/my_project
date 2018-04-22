<?php
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить это меню?</div>
    <a href='?deleteMenu={$_GET['deleteMenu']}&true=true'>Да</a>
    <a href='?deleteMenu={$_GET['deleteMenu']}&false=false'>Отмена</a>
</div>";
if ($_GET['deleteMenu'] && $_GET['true'] == 'true')
{
    ?>
    <script>
        document.location.href = 'http://localhost/my_project/admin/?page=menuList';
    </script>
    <?php
    $vcreateeditmenu->deleteMenus($_GET['deleteMenu']);
}
elseif ($_GET['deleteMenu'] && $_GET['false'] == 'false')
{
    ?>
    <script>
        alert('Удаление отменено');
        document.location.href = 'http://localhost/my_project/admin/?page=menuList';
    </script>
    <?php
}