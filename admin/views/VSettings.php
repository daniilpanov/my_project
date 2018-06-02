<?php
$news_settings = $vsettings->prepareSettings();
?>
<div class="create">
    <div class="row">
        <div class="col-md-4">кол-во новостей на странице:</div>
        <div class="col-md-4">
            <?php
            echo "<input type='text' value='{$news_settings['news_per_page']}'>";
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php
            echo "<input type='submit' value='Обновить'>";
            ?>
        </div>
    </div>
</div>