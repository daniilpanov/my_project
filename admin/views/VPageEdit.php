<?php
if (!isset($_GET['admin']))
{
    // вызываем метод, с помощью которого получаем всю информацию о всех страничах
    $pages = $vcreateeditpage->getAllPages();
    // для того, чтобы выбрать, в каком меню находится(будет находиться) страничка
    $menus = $vcreateeditpage->getAllMenus();
}
else
{
    echo "ok";
    $pages = $vcreateeditpage->getAllPages(true);
}

// перебираем массив со страницами и записываем то, что нужно в другой массив(см.ниже)
foreach ($pages as $key => $value)
{
    // если id в $value совпадает с id редактируемого меню, то
    if ($value['id'] == $_GET['editPage'])
    {
        $onePage = $value;
    }
}
?>
<div class="name___">Вы редактируете страницу &#10077;<?=$onePage['menu_name']?>&#10078;</div>
<!--Далее - форма для редактирования данных, которые находятся в массиве $onePage-->
<div class="create">
    <form method="post">
        <div class="row">
            <div class="col-md-4">название страницы в меню:</div>
            <div class="col-md-4"><input type="text" name="menu_name" value="<?=$onePage['menu_name']?>" required></div>
        </div>

        <?php
        if (!isset($_GET['admin']))
        {
            ?><div class="row">
                <div class="col-md-4">позиция страницы в меню:</div>
                <div class="col-md-4">
                    <select name="position">
                        <?php
                        foreach ($pages as $v)
                        {
                            if ($v['position'] == $onePage['position']+1)
                            {
                                echo "<option value='{$v['position']}' selected>{$v['menu_name']}</option>";
                            }
                            else
                            {
                                echo "<option value='{$v['position']}'>{$v['menu_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">в каком меню:</div>
                <div class="col-md-4">
                    <select name="menu_number">
                        <?php
                        foreach ($menus as $value)
                        {
                            if ($value['id'] == $onePage['menu_number'])
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
                <div class="col-md-4">родительский пункт меню:</div>
                <div class="col-md-4">
                    <select name = "parent_id"  class="select">
                        <?php $parent_category = $vcreateeditpage->category_return();

                        foreach ($parent_category as $menu_name => $id)
                        {
                            if($onePage['parent_id'] == $id)
                            {
                                ?>
                                <option value = "<?php echo $id; ?>" selected><?php echo $menu_name; ?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                                <option value = "<?php echo $id; ?>"><?php echo $menu_name; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">видимость странички во всех меню:</div>
                <div class="col-md-4">
                    <select name="general_visible" class="select">
                        <?php
                        if ($onePage['general_visible'] == '1')
                        {
                            echo "<option value='0'>невидима</option><option value='1' selected>видима</option>";
                        }
                        else
                        {
                            echo "<option value='0' selected>невидима</option><option value='1'>видима</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">видимость странички в верхнем меню:</div>
                <div class="col-md-4">
                    <select name="visible_at_top_menu" class="select">
                        <?php
                        if ($onePage['visible_at_top_menu'] == '1')
                        {
                            echo "<option value='0'>невидима</option><option value='1' selected>видима</option>";
                        }
                        else
                        {
                            echo "<option value='0' selected>невидима</option><option value='1'>видима</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">заголовок страницы (title):</div>
                <div class="col-md-4"><input type="text" name="title" value="<?=$onePage['title']?>"></div>
            </div>
            <div class="row">
                <div class="col-md-4">ключевые слова (keywords):</div>
                <div class="col-md-4"><input type="text" name="keywords" value="<?=$onePage['keywords']?>"></div>
            </div>
            <div class="row">
                <div class="col-md-4">описание (description):</div>
                <div class="col-md-4"><textarea name="description" spellcheck="false"><?=$onePage['description']?></textarea></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    иконка: (<a href="http://fontawesome.veliovgroup.com/design.html" title="список названий" target="_blank">список иконок</a>)
                    <i class="<?=$onePage['menu_icon']." ".$onePage['icon_size']?>"></i>
                </div>
                <div class="col-md-4"><input type="text" name="menu_icon" value="<?=$onePage['menu_icon']?>"></div>
            </div>
            <div class="row">
                <div class="col-md-4">размер иконки:</div>
                <div class="col-md-4">
                    <select name = "icon_size" class="select">
                        <?php
                        if ($onePage['icon_size'] == "icon-large")
                        {
                            ?>
                            <option value="icon-large" selected>icon-large</option>
                            <option value="icon-1x">icon-1x</option>
                            <option value="icon-2x">icon-2x</option>
                            <option value="icon-3x">icon-3x</option>
                            <option value="icon-4x">icon-4x</option>
                            <?php
                        }
                        elseif ($onePage['icon_size'] == "icon-1x")
                        {
                            ?>
                            <option value="icon-large">icon-large</option>
                            <option value="icon-1x" selected>icon-1x</option>
                            <option value="icon-2x">icon-2x</option>
                            <option value="icon-3x">icon-3x</option>
                            <option value="icon-4x">icon-4x</option>
                            <?php
                        }
                        elseif ($onePage['icon_size'] == "icon-2x")
                        {
                            ?>
                            <option value="icon-large">icon-large</option>
                            <option value="icon-1x">icon-1x</option>
                            <option value="icon-2x" selected>icon-2x</option>
                            <option value="icon-3x">icon-3x</option>
                            <option value="icon-4x">icon-4x</option>
                            <?php
                        }
                        elseif ($onePage['icon_size'] == "icon-3x")
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
                    </select>
                </div>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="parent_id" value="0">
            <input type="hidden" name="menu_number" value="0">
            <input type="hidden" name="general_visible" value="0">
            <input type="hidden" name="visible_at_top_menu" value="0">
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-4">содержание страницы:</div>
            <div class="col-md-4"><textarea name="content" spellcheck="false"><?=$onePage['content']?></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="submit" value="Сохранить"></div>
        </div>
        <!--для меньшего размера кода-->
        <input type="hidden" name="updated" value="<?=time()?>">
    </form>
</div>
