<?php

//Инф. обо всех меню(для выбора, в каком меню будет состоять страничка)
$menus = $vcreateeditpage->getAllMenus();
?>
<!--Форма для создания странички-->
<div class="create">
    <form method="post">
        <div class="row">
            <div class="col-md-4">название страницы в меню:</div>
            <div class="col-md-4"><input type="text" name="menu_name"></div>
        </div>
        <div class="row">
            <div class="col-md-4">в каком меню:</div>
            <div class="col-md-4">
                <select name="menu_number">
                    <?php
                    //В цикле выводим все возможные меню:
                    foreach ($menus as $value)
                    {
                        echo "<option value='{$value['id']}'>{$value['name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">позиция:</div>
            <div class="col-md-4">
                <select name="position">
                    <?php $menu = $vcreateeditpage->menu_return('-в конец списка-');
                    $max = count($menu);
                    $counter = 0;

                    foreach ($menu as $menu_name => $position)
                    {
                        $counter++;
                        if($counter != $max)
                        {?>
                            <option value = "<?php echo $position; ?>"><?=$menu_name ?></option>
                            <?php
                        }
                        else
                        {?>
                            <option value = "<?php echo $position; ?>" selected><?=$menu_name ?></option>
                        <?php   }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">заголовок страницы (title):</div>
            <div class="col-md-4"><input type="text" name="title"></div>
        </div>
        <div class="row">
            <div class="col-md-4">ключевые слова (keywords):</div>
            <div class="col-md-4"><input type="text" name="keywords"></div>
        </div>
        <div class="row">
            <div class="col-md-4">описание (description):</div>
            <div class="col-md-4"><textarea name="description"></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                иконка: (<a href="http://fontawesome.veliovgroup.com/design.html" title="список названий" target="_blank">список иконок</a>)
            </div>
            <div class="col-md-4"><input type="text" name="menu_icon"></div>
        </div>
        <div class="row">
            <div class="col-md-4">размер иконки:</div>
            <div class="col-md-4">
                <select name = "icon_size" class="select">
                    <option value = "icon-large" selected>icon-large</option>
                    <option value = "icon-1x">icon-1x</option>
                    <option value = "icon-2x">icon-2x</option>
                    <option value = "icon-3x">icon-3x</option>
                    <option value = "icon-4x">icon-4x</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">содержание страницы:</div>
            <div class="col-md-4"><textarea name="content"></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"> <input type="submit" value="Добавить"></div>
        </div>
        <!--для меньшего размера кода-->
        <input type="hidden" name="created" value="<?=time()?>">
    </form>
</div>
