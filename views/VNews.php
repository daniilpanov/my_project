<?php
$news = new app\classes\CNews();
?>
<table class="news">
    <tr>
        <td class="center"><strong>Главные новости:</strong></td>
    </tr>
    <tr>
        <td>
            <?php
            $allNews = $news->getNews();

            foreach ($allNews as $key => $value)
            {
                echo "<div class='news_item'>";
                    echo "<div class='center'><img src='{$value['image']}' width='{$value['image_width']}'></div>";
                    echo "<div class='center'><a href='?news={$value['id']}'>{$value['name']}</a></div>";
                    echo "<div class='desc'>";
                    echo "{$value['description']}";
                    echo "<a href='?news={$value['id']}'>  Подробнее ...</a>";
                    echo "</div>";
                echo "</div>";

            }

            $countNews = $news->counter();
            ?>
        </td>
    </tr>
    <tr>
        <td><u><b>Общее количество новостей: <?=$countNews?>!</b></u></td>
    </tr>
</table>