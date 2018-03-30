<div class="checkYourDoing">
    <hr class="forMenu" size="18px">
    <a class="doing" href="index.php" title="Вернуться на главную страницу"><i class="icon-home icon-large"></i></a>
    <a class="doing" href="?doing=seeMenu" title="Просмотреть все меню"><i class="icon-tasks icon-large"></i></a>
    <a class="doing" href="?doing=seePages" title="Просмотреть все страницы"><i class="icon-th-list icon-large"></i></a>
    <a class="doing" href="?doing=createMenu" title="Создать меню"><i class="icon-edit icon-large"></i></a>
    <a class="doing" href="?doing=createPage" title="Создать страницу"><i class="icon-book icon-large"></i></a>
    <input type="submit" name="delete" id="delete" hidden><label for="delete" class="doing" title="Удалить выбранное"><i class="icon-trash icon-large"></i></label>

    <a class="doing" href='?page=base' title="Выйти"><i class="icon-off icon-large"></i></a>
    <a class="doing" href='?page=logout' title="Выйти"><i class="icon-off icon-large"></i></a>
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
            <td><a href='?add={$id}'><i class='icon-cog icon-large'></i></a></td>
            <td><a href='?delete={$id}'><i class='icon-trash icon-large'></i></a></td>
            <td><input type='checkbox' name='check[]' value='checked!'></td>
        </tr>";
    }
    ?>
    </table>
</div>