<?php
$menus = $vcreateeditmenu->getAllMenus();
foreach ($menus as $key => $value)
{
    if ($value['id'] == $_GET['editMenu'])
    {
        foreach ($value as $item)
        {
            $oneMenu[] = $item;
        }
    }
}
?>
<div class="create">
    <form method="post">
        <div class="row">
            <div class="col-md-4">название меню:</div>
            <div class="col-md-4"><input type="text" name="name" value="<?=$oneMenu[2]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                иконка: (<a href="http://fontawesome.veliovgroup.com/design.html" title="список названий" target="_blank">список иконок</a>)
            </div>
            <div class="col-md-4"><input type="text" name="icon" value="<?=$oneMenu[1]?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">размер иконки:</div>
            <div class="col-md-4">
                <select name = "icon_size" class="select">
                    <option value = "icon-large">icon-large</option>
                    <option value = "icon-1x">icon-1x</option>
                    <option value = "icon-2x">icon-2x</option>
                    <option value = "icon-3x">icon-3x</option>
                    <option value = "icon-4x">icon-4x</option>
                </select><?if (!empty($oneMenu[3])) echo '('.$oneMenu[3].')'?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="submit" value="Добавить"></div>
        </div>
        <input type="hidden" name="updated" value="<?=time()?>">
    </form>
</div>