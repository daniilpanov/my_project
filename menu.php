<hr size="3px">
<div class="jumbotron">
    <b><i><a class="content" href="index.php">Главная</a>
    <a class="content" href="?page=reviews">Отзывы</a>
    <a class="content" href="?page=info">О сайте</a>
    <a class="content" href="admin/app">Войти как администратор</a></i></b>
</div>
<?php
$pages[] = array('number'=>"SELECT COUNT(id) FROM pages");
$pages[] = array('all'=>"SELECT * FROM pages");
foreach ($pages as $value)
{
    $date = \app\classes\Db::getInstance()->sql($value);

    if (!empty($value['number']))
    {
        echo "<div class='jumbotron'>";
        for ($i=1;$i<$value['number'];$i++)
        {
            ?>
            <a href='<?=$value['url']?>'><?=$value['all']?></a>
            <?php
        }
        echo "</div>";
    }
}

