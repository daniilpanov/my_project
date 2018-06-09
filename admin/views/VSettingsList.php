<?php
$news_settings = $vsettings->prepareSettings();
?>
<div id="list_table">
    <div class="row list_table_header">
        <div class="col-md-6">константа</div>
        <div class="col-md-6">значение</div>
    </div>
    <?php
        foreach ($news_settings as $one_setting_value)
        {
            echo "
            <a href='?editSetting={$one_setting_value['name']}'><div class=\"row list_table_row\">
                <div class=\"col-md-6\">{$one_setting_value['translate']}</div>
                <div class=\"col-md-6\">{$one_setting_value['value']}</div>
            </div></a>";
        }
    ?>
</div>
