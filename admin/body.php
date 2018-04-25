<body>
<header>
    <div id="header">
        <div id="logo"><img src="img/pirate-bay.jpg" width="100" height="100"></div>
        <div id="siteName">
            <h1>MY PROJECT</h1>
        </div>
    </div>
</header>

<div id="navigation">
    <a href = "index.php" title="Главная"><i class="icon-home icon-large"></i></a>
    <a href = "?page=menuList" title="Список меню"><i class="icon-reorder icon-large"></i></a>
    <a href = "?page=pageList" title="Список страниц"><i class="icon-list-ol icon-large"></i></a>
    <a href = "?page=news" title="Новости"><i class="icon-list-alt"></i></a>
    <a href = "?page=rureviews" title="Отзывы"><i class="icon-thumbs-up icon-large"></i></a>
    <a href = "?page=languages" title="Языки"><i class="icon-globe icon-large"></i></a>
    <a href = "?page=changeAuth" title="Пользователи"><i class="icon-user icon-large"></i></a>
    <a href = "?page=settings" title="Настройки"><i class="icon-cog icon-large"></i></a>
    <a href = "?page=help" title="Помощь"><i class="icon-info-sign icon-large"></i></a>
    <a href = "../index.php" title="На сайт" target="_blank"><i class="icon-reply icon-large"></i></a>
    <a href = "?page=logout" title="Выход"><i class="icon-off icon-large"></i></a>
</div><!--navigation-->

<?php

// создаем новые обьекты
$vcreateeditpage = new \app\classes\CPageCreateEdit(); // для работы со страницами
$vgetauth = new \app\classes\CChangeAuth();
$vcreateeditmenu = new \app\classes\CMenuCreateEdit();

// если от пользователя получены данные из формы
if ($_POST)
{
    if ($_GET['page'] == 'createPage')
    {
        $vcreateeditpage->createPage($_POST);
    }
    elseif ($_GET['page'] == 'createMenu')
    {
        $vcreateeditmenu->createMenu($_POST);
    }
    elseif ($_GET['editMenu'])
    {
        $vcreateeditmenu->updateMenu($_GET['editMenu'], $_POST);
    }
    elseif ($_GET['editPage'])
    {
        $vcreateeditpage->updatePage($_GET['editPage'], $_POST);
    }
}
// Маршрутизатор

// если нажата кнопка, подключаем соответствующие виды
if ($_GET)
{
    if($_GET['page'])
    {
        if ($_GET['page'] == 'pageList')
        {
            require_once "views/VPageList.php";
        }
        elseif ($_GET['page'] == 'changeAuth')
        {
            require_once "views/VChangeAuth.php";
        }
        elseif ($_GET['page'] == 'createPage')
        {
            require_once "views/VPageCreate.php";
        }
        elseif ($_GET['page'] == 'menuList')
        {
            require_once "views/VMenuList.php";
        }
        elseif ($_GET['page'] == 'createMenu')
        {
            require_once "views/VMenuCreate.php";
        }
    }
    elseif ($_GET['deletePage'])
    {
        require_once "views/VPageDelete.php";
    }
    elseif ($_GET['deleteMenu'])
    {
        require_once "views/VMenuDelete.php";
    }
    elseif ($_GET['editMenu'])
    {
        require_once "views/VMenuAdd.php";
    }
    elseif ($_GET['editPage'])
    {
        require_once "views/VPageAdd.php";
    }
}

