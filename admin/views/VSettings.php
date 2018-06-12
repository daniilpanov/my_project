<?php
$news_settings = $vsettings->prepareSettings();
$counter = 0;
?>
<div class="create">
    <form method="post">
        <?php
        foreach ($news_settings as $oneSetting)
        {
            echo "<input type='hidden' name='{$counter}[name]' value='{$oneSetting['name']}'>";
            echo "<div class='row'>";
                echo "<div class='col-md-4'><input type='text' name='{$counter}[translate]' value='{$oneSetting['translate']}' required></div>";
                echo "<div class='col-md-4'><input type='text' name='{$counter}[value]' value='{$oneSetting['value']}' required></div>";
            echo "</div>";
            $counter++;
        }
        ?>
        <div class='row'>
            <div class='col-md-4'></div>
            <div class='col-md-4'><input type="submit" value="Сохранить"></div>
        </div>
    </form>
</div>
