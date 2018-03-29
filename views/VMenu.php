<hr size="3px">
<?php
$pages = new \app\classes\CMenu();
$menus = $pages->prepareMenu();
echo "<div id='admin'><a href='admin/'>Войти как администратор</a></div>";
echo "<div class='jumbotron menu'><i>";

//Считаем кол-во элементов в массиве $menus
$count = count($menus);

if ($count/5<=1)//Если $count / 5 будет < или = 1, топросто выводим меню
{
    echo "<ol>";
        foreach ($menus as $value)
        {
            echo "<li><a class='menu' href='index.php?page={$value['id']}'>{$value['menu_name']}</a></li>";
        }
    echo "</ol>";
}
elseif ($count/5>1)//Иначе
{
    $count_pages_from_menu = 1;//- создаём $count_pages_from_menu для того, чтобы считать
    //кол-во созданных страниц и передавать её значения id тега <ol>
    $i = 1;
    echo "<ol id='menu{$count_pages_from_menu}' class='pages_from_menu'>";
    foreach ($menus as $value)
    {
        if ($i<6)//Если переменная $i < 6, то просто выводим 5 ссылок на страницы
        {
            echo "<li><a class='menu' href='index.php?page={$value['id']}'>{$value['menu_name']}</a></li>";
        }
        elseif ($i>=6)//остальные мы выводим в другом теге <ol> для возможности их скрытия
        {
            echo "</ol>";
            $count_pages_from_menu++;
            echo "<ol class='pages_from_menu' id='menu{$count_pages_from_menu}'>";
            $i = 1;
        }
    }
}
if (($count%5)==0)//Если остаток от деления $count на 5 = 0
{
    if (!$_GET['page'])//(для того, чтобы не произошла ош. соед. с БД)
    {
        for ($a=1;$a<=ceil($count/5);$a++)//выводим ссылки на меню
        {
            echo "<a class='slide' href='?menu={$a}'>{$a}</a>";
        }
    }
    elseif ($_GET['page'])
    {
        for ($a=1;$a<=ceil($count/5);$a++)
        {
            echo "<a class='slide' href='?page={$_GET['page']}&menu={$a}'>{$a}</a>";
        }
    }
}
elseif (($count%5)!=0)//Если остаток от деления $count на 5 не равен 0
{
    if (!$_GET['page'])//(для того, чтобы не произошла ош. соед. с БД)
    {
        for ($a=1;$a<=ceil($count/5);$a++)//выводим ссылки на меню
        {
            echo "<a class='slide' href='?menu={$a}'>{$a}</a>";
        }
    }
    elseif ($_GET['page'])
    {
        for ($a=1;$a<=ceil($count/5);$a++)
        {
            echo "<a class='slide' href='?page={$_GET['page']}&menu={$a}'>{$a}</a>";
        }
    }
}
echo "</i></div>";


if (!$_GET['menu'])
{
    ?>
    <style>
       #menu1
       {
           display: block;
       }
    </style>
    <?php
}
elseif ($_GET['menu'])
{
    ?>
    <style>
        #menu<?=$_GET['menu']?>
        {
            display: block;
        }
    </style>
    <?php
}
