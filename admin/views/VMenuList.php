<?php
$menusList = $vcreateeditmenu->getAllMenus();
?>
<div class="create"><a href="?page=createMenu"><span class="icon-plus-sign icon-large mysubmenu"></span></a></div>
<div id="pagelist_table">
    <div class="row pagelist_table_header">
        <div class="col-md-3">Название меню</div>
        <div class="col-md-1">Язык</div>
        <div class="col-md-2">Создано</div>
        <div class="col-md-2">Изменено</div>
        <div class="col-md-2">Редактировать</div>
        <div class="col-md-1">Удалить</div>
        <div class="col-md-1"><input type="checkbox" name="deleteselected"></div>
    </div>

    <?php
    foreach ($menusList as $value)
    {?>

        <div class="row pagelist_table_row">
            <div class="col-md-3">
                    <?php echo "<a href='?editMenu={$value['id']}'>{$value['name']}</a><br>";?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2"><?=date("d.m.Y \в H:i:s",$value['created'])?></div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <?php echo "<a href='?editMenu={$value['id']}'><span class='glyphicon glyphicon-pencil'></span></a><br>";?>
            </div>
            <div class="col-md-1"><?php echo "<a href='?deleteMenu={$value['id']}'><span class='glyphicon glyphicon-trash'></span></a>"?> </div>
            <div class="col-md-1"></div>
        </div>

    <?php
    }
    ?>
</div>
