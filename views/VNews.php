<?php
$news = new app\classes\CNews();
?>
<table class="news">
    <tr>
        <td class="center"><strong>Главные новости:</strong></td>
    </tr>
    <tr>
        <td>
            <ul>
                <?php
                $allNews = $news->getNews();

                foreach ($allNews as $key => $value)
                {
                    echo "<li><a href='?news={$value['id']}'>{$value['name']}</a></li>";
                    echo "<ul>";
                    echo "<li>{$value['description']}</li>";
                    echo "</ul>";
                }

                $countNews = $news->counter();
                ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td><u><b>Общее количество новостей: <?=$countNews?>!</b></u></td>
    </tr>
</table>