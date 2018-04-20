<?php
$news = new app\classes\CNews();
?>

<ul id="news">
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
<?=$countNews?>