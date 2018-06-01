<?php
$all_news = $news->getAllNewsFromDB();
?>
<table class="news">
    <tr>
        <td class="center"><strong>Главные новости:</strong></td>
    </tr>
    <tr>
        <td>
            <?php
            foreach ($all_news as $key => $one_news)
            {
                echo "<div class='news_item'>";
                    echo "<div class='center'>
                              <img src='{$one_news['image']}' width='{$one_news['image_width']}{$one_news['type_of_measure_unit']}'>
                          </div>";
                    echo "<div class='center'><a href='?news={$one_news['id']}'>{$one_news['name']}</a></div>";
                    echo "<div class='desc'>";
                    echo "{$one_news['description']}";
                    echo "<a href='?news={$one_news['id']}'> Подробнее ...</a>";
                    echo "</div>";
                echo "</div>";

            }
            ?>
        </td>
    </tr>
</table>