<?php
echo "<div class='question'>
    <div>Вы уверены,<br>что хотите удалить эту страницу?</div>
    <a href='?deletePage={$_GET['deletePage']}&true=true'>Да</a>
    <a href='?deletePage={$_GET['deletePage']}&false=false'>Отмена</a>
</div>";
if ($_GET['deletePage'] && $_GET['true'] == 'true')
{
    ?>
    <script>
        document.location.href = 'http://localhost/my_project/admin/?page=pageList';
    </script>
    <?php
    $vcreateeditpage->deletePage($_GET['deletePage']);
}
elseif ($_GET['deletePage'] && $_GET['false'] == 'false')
{
    ?>
    <script>
        alert('Удаление отменено');
        document.location.href = 'http://localhost/my_project/admin/?page=pageList';
    </script>
    <?php
}