<?php
// вызываем метод, с помощью которого получаем всю информацию о всех меню
$menus = $vcreateeditmenu->getAllMenus();

// перебираем массив и записываем то, что нужно в другой массив(см.ниже)
foreach ($menus as $key => $value)
{
    // если id в $value совпадает с id редактируемого меню, то
    if ($value['id'] == $_GET['editMenu'])
    {
        $oneMenu = $value;
    }
}
?>
<div class="name___">Вы редактируете меню &#10077;<?=$oneMenu['name']?>&#10078;</div>
<!--Далее - форма для редактирования данных, которые находятся в массиве $oneMenu-->
<div class="create">
    <form method="post">
        <div class="row">
            <div class="col-md-4">название меню:</div>
            <div class="col-md-4"><input type="text" name="name" value="<?=$oneMenu['name']?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">позиция страницы в меню:</div>
            <div class="col-md-4">
                <select name="position">
                    <?php
                    foreach ($menus as $v)
                    {
                        if ($v['position'] == $oneMenu['position']+1)
                        {
                            echo "<option value='{$v['position']}' selected>{$v['name']}</option>";
                        }
                        else
                        {
                            echo "<option value='{$v['position']}'>{$v['name']}</option>";
                        }
                    }
                    ?>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                иконка: (<a href="http://fontawesome.veliovgroup.com/design.html" title="список названий" target="_blank">список иконок</a>)
            </div>
            <div class="col-md-4"><input type="text" name="icon" value="<?=$oneMenu['icon']?>"></div>
        </div>
        <div class="row">
            <div class="col-md-4">размер иконки:</div>
            <div class="col-md-4">
                <select name = "icon_size" class="select">
                    <?php
                    if ($oneMenu['icon_size'] == "icon-large")
                    {
                        ?>
                        <option value="icon-large" selected>icon-large</option>
                        <option value="icon-1x">icon-1x</option>
                        <option value="icon-2x">icon-2x</option>
                        <option value="icon-3x">icon-3x</option>
                        <option value="icon-4x">icon-4x</option>
                        <?php
                    }
                    elseif ($oneMenu['icon_size'] == "icon-1x")
                    {
                        ?>
                        <option value="icon-large">icon-large</option>
                        <option value="icon-1x" selected>icon-1x</option>
                        <option value="icon-2x">icon-2x</option>
                        <option value="icon-3x">icon-3x</option>
                        <option value="icon-4x">icon-4x</option>
                        <?php
                    }
                    elseif ($oneMenu['icon_size'] == "icon-2x")
                    {
                        ?>
                        <option value="icon-large">icon-large</option>
                        <option value="icon-1x">icon-1x</option>
                        <option value="icon-2x" selected>icon-2x</option>
                        <option value="icon-3x">icon-3x</option>
                        <option value="icon-4x">icon-4x</option>
                        <?php
                    }
                    elseif ($oneMenu['icon_size'] == "icon-3x")
                    {
                        ?>
                        <option value="icon-large">icon-large</option>
                        <option value="icon-1x">icon-1x</option>
                        <option value="icon-2x">icon-2x</option>
                        <option value="icon-3x" selected>icon-3x</option>
                        <option value="icon-4x">icon-4x</option>
                        <?php
                    }
                    else
                    {
                        ?>
                        <option value="icon-large">icon-large</option>
                        <option value="icon-1x">icon-1x</option>
                        <option value="icon-2x">icon-2x</option>
                        <option value="icon-3x">icon-3x</option>
                        <option value="icon-4x" selected>icon-4x</option>
                        <?php
                    }
                    ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="submit" value="Сохранить"></div>
        </div>
        <!--для меньшего размера кода-->
        <input type="hidden" name="updated" value="<?=time()?>">
    </form>
</div>