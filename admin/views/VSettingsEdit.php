<?php
$news_settings = $vsettings->prepareSettings($_GET['editSetting']);
?>
<div class="create">
    <form method="post">
        <input type="hidden" name="name" value="<?=$news_settings['name']?>">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="translate" value="<?=$news_settings['translate']?>">
            </div>
            <div class="col-md-4">
                <input type="text" name="value" value="<?=$news_settings['value']?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <input type="submit"value="Обновить">
            </div>
        </div>
    </form>
</div>
