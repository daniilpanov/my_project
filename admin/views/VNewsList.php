<?php
$newsList = $vcreateeditnews->getAllNews();
?>
<div class="create"><a href="?page=createNews"><span class="icon-plus-sign icon-large mysubmenu"></span></a></div>
<div id="list_table">
    <div class="row list_table_header">
        <div class="col-md-3">Название новости</div>
        <div class="col-md-1">Язык</div>
        <div class="col-md-2">Создана</div>
        <div class="col-md-2">Изменена</div>
        <div class="col-md-2">Редактировать</div>
        <div class="col-md-1">Удалить</div>
        <div class="col-md-1"><input type="checkbox" name="deleteselected"></div>
    </div>

    <?php
    foreach ($newsList as $value)
    {?>

        <div class="row list_table_row">
            <div class="col-md-3">
                <?php echo "<a href='?editNews={$value['id']}'>{$value['name']}</a><br>";?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2"><?=date("d.m.Y \в H:i:s",$value['created'])?></div>
            <div class="col-md-2"><?
                if (!is_null($value['updated']))
                {
                    echo date("d.m.Y \в H:i:s",$value['updated']);
                }
                ?></div>
            <div class="col-md-2">
                <?php echo "<a href='?editNews={$value['id']}'><span class='glyphicon glyphicon-pencil'></span></a><br>";?>
            </div>
            <div class="col-md-1"><?php echo "<a href='?deleteNews={$value['id']}'><span class='glyphicon glyphicon-trash'></span></a>"?> </div>
            <div class="col-md-1"></div>
        </div>

        <?php
    }
    ?>
</div>
