<div class="checkYourDoing">
    <hr class="forMenu" size="18px">
    <a class="doing" href="?doing=delete"><i class="icon-trash"></i></a>
    <a class="doing" href="?doing=seeMenu" title="Просмотреть все меню"><i class="icon-tasks do"></i></a>
    <a class="doing" href="?doing=seePages" title="Просмотреть все страницы"><i class="icon-th-list do"></i></a>
    <a class="doing" href="?doing=back" title="Вернуться на главную страницу"><i class="icon-home do"></i></a>
    <a class="doing" href="?doing=create" title="Создать"><i class="icon-edit do"></i></a>
    <a class="doing" href="?doing=seeFav" title="Быстрый доступ"><i class="icon-book do"></i></a>
    <a class="doing" href="?doing=addFav" title="Редактировать быстрый доступ"><i class="icon-list-alt do"></i></a>

    <a class="doing" href='?page=logout' title="Выйти"><i class="icon-off do"></i></a>
</div>
<div class="pages menu">
    <table id="pages">
    <?php
    $pages = new \admin\app\classes\CMenu();
    $menus = $pages->prepareMenu();
    $id=0;
    foreach ($menus as $value)
    {
        $id++;
        echo "
        <tr>
            <td>{$id}</td>
            <td>{$value['menu_name']}</td>
            <td><a href='add={$id}'><i class='icon-cog'></i></a></td>
            <td><a href='?delete={$id}'><i class='icon-trash'></i></a></td>
            <td><input type='checkbox' name='check[]' value='checked!'></td>
        </tr>";
    }
    ?>
    </table>
</div>

<?php
if ($_GET['doing'])
{
    if($pages->add_pages($_GET['doing'])) echo "ok";
}
elseif ($_GET)
{
    if ($_GET['add'] || $_GET['delete'])
    {

    }
}