<body>
<header>
    <div id="header">
        <div id="logo"><img src="img/pirate-bay.jpg" width="100" height="100"></div>
        <div id="siteName">
            <h1>MY PROJECT</h1>
        </div>
    </div>
</header>

<div id="navigation-container">
    <div id="navigation">
        <a href = "index.php" title="Главная"><i class="icon-home icon-large"> </i></a>
        <a href = "?page=menuList" title="Список меню"><i class="icon-reorder icon-large"> </i></a>
        <a href = "?page=pageList" title="Список страниц"><i class="icon-list-ol icon-large"> </i></a>
        <a href = "?page=rureviews" title="Отзывы"><i class="icon-thumbs-up icon-large"> </i></a>
        <a href = "?page=languages" title="Языки"><i class="icon-globe icon-large"> </i></a>
        <a href = "?page=changeAuth" title="Пользователи"><i class="icon-user icon-large"> </i></a>
        <a href = "?page=settings" title="Настройки"><i class="icon-cog icon-large"> </i></a>
        <a href = "?page=help" title="Помощь"><i class="icon-info-sign icon-large"> </i></a>
        <a href = "../index.php" title="На сайт" target="_blank"><i class="icon-reply icon-large"> </i></a>
        <a href = "exit.php" title="Выход"><i class="icon-off icon-large"> </i></a>
    </div><!--navigation-->
</div><!--navigation-container-->

<?php

// создаем новые обьекты
$vcreateedit = new \app\classes\CPageCreateEdit(); // для работы со страницами



// если от пользователя получены данные из формы

// Маршрутизатор

// если нажата кнопка, подключаем соответствующие виды

if ($_GET)
{
    if($_GET['page'])
    {
        if ($_GET['doing'] == 'menuList')
        {

        }
        elseif ($_GET['page'] == 'pageList')
        {
            require_once "views/VPageList.php";
        }
    }
}