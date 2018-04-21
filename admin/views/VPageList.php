<?php
$pagesList = $vcreateeditpage->getAllPages();
?>
<div class="create"><a href="?page=createPage"><span class="icon-plus-sign icon-large mysubmenu"></span></a></div>
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
            <div class="col-md-2"><?php echo date("d.m.Y \в H:i:s",$value['created'])?></div>
            <div class="col-md-2">
                <?php
                if (!empty($value['updated']))
                echo date("d.m.Y \в H:i:s",$value['updated'])
                ?>
            </div>
            <div class="col-md-2">
                <?php echo "<a href='?editPage={$value['id']}'><span class='glyphicon glyphicon-pencil'></span></a><br>";?>
            </div>
            <div class="col-md-1">
                <?php echo "<a class='delete' onclick='document.getElementsByClassName(\"rotateX\")[0].style.display = \"block\"' href='?deletePage={$value['id']}'><span class='glyphicon glyphicon-trash'></span></a><br>";?>
            </div>
            <div class="col-md-1"></div>
        </div>

    <?php
    }
    ?>
</div>
