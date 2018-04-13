<?php
$pagesList = $vcreateedit->getAllPages();
?>
<div class="create"><a href="?page=create"><span class="icon-plus-sign icon-large mysubmenu"></span></a></div>
<div id="pagelist_table">
    <div class="row pagelist_table_header">
        <div class="col-md-3">Название страницы</div>
        <div class="col-md-1">Язык</div>
        <div class="col-md-2">Создана</div>
        <div class="col-md-2">Изменена</div>
        <div class="col-md-2">Редактировать</div>
        <div class="col-md-1">Удалить</div>
        <div class="col-md-1"><input type="checkbox" name="deleteselected"></div>
    </div>

    <?php
    foreach ($pagesList as $value)
    {?>

        <div class="row pagelist_table_row">
            <div class="col-md-3">

                    <?php echo "<a href='?editPage={$value['id']}'>{$value['menu_name']}</a><br>";?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2"><?=date("d.m.Y \в H:i:s",$value['created'])?></div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
                <?php echo "<a href='?editPage={$value['id']}'><span class=\"glyphicon glyphicon-pencil\"></span></a><br>";?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
        </div>

    <?php
    }
    ?>
</div>
