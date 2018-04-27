<?php
$menus = $vcreateeditpage->getAllMenus();
$pages = $vcreateeditpage->getAllPages();
foreach ($pages as $key => $value)
{
    if ($value['id'] == $_GET['editPage'])
    {
        foreach ($value as $item)
        {
            $onePage[] = $item;
        }
    }
}

foreach ($menus as $key => $value)
{
    if ($value['id'] == $onePage[10])
    {
        foreach ($value as $item)
        {
            $onePage[] = $item;
        }
    }
}
?>
<div class="create">
    <form method="post">
        <div class="row">
            <div class="col-md-4">название страницы в меню:</div>
            <div class="col-md-4"><input type="text" name="menu_name" value="<?=$onePage[1]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">в каком меню:</div>
            <div class="col-md-4">
                <select name="menu_number">
                    <?php
                    foreach ($menus as $value)
                    {
                        if ($value['id'] == $onePage[10])
                        {
                            echo "<option value='{$value['id']}' selected>{$value['name']}</option>";
                        }
                        else
                        {
                            echo "<option value='{$value['id']}'>{$value['name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">заголовок страницы (title):</div>
            <div class="col-md-4"><input type="text" name="title" value="<?=$onePage[3]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">ключевые слова (keywords):</div>
            <div class="col-md-4"><input type="text" name="keywords" value="<?=$onePage[6]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">описание (description):</div>
            <div class="col-md-4"><input type="text" name="description" value="<?=$onePage[7]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                иконка: (<a href="http://fontawesome.veliovgroup.com/design.html" title="список названий" target="_blank">список иконок</a>)
            </div>
            <div class="col-md-4"><input type="text" name="menu_icon" value="<?=$onePage[8]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">размер иконки:</div>
            <div class="col-md-4">
                <select name = "icon_size" class="select">
                    <option value="icon-large">icon-large</option>
                    <option value="icon-1x">icon-1x</option>
                    <option value="icon-2x">icon-2x</option>
                    <option value="icon-3x">icon-3x</option>
                    <option value="icon-4x">icon-4x</option>
                </select>
                <?if (!empty($onePage[9])) echo '(Размер: '.$onePage[9].')'; else echo 'У этой странички не указан размер иконки'?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">содержание страницы:</div>
            <div class="col-md-4"><textarea name="content"><?=$onePage[1]?></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"> <input type="submit" value="Сохранить"></div>
        </div>
        <input type="hidden" name="updated" value="<?=time()?>">
    </form>
</div>
