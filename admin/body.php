<body>
<!--Название сайта и логотип-->
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
    <a href = "?page=newsList" title="Новости"><i class="icon-list-alt"></i></a>
    <a href = "?page=rureviews" title="Отзывы"><i class="icon-thumbs-up icon-large"></i></a>
    <a href = "?page=languages" title="Языки"><i class="icon-globe icon-large"></i></a>
    <a href = "?page=authList" title="Пользователи"><i class="icon-user icon-large"></i></a>
    <a href = "?page=settings" title="Настройки"><i class="icon-cog icon-large"></i></a>
    <a href = "?page=help" title="Помощь"><i class="icon-info-sign icon-large"></i></a>
    <a href = "../index.php" title="На сайт" target="_blank"><i class="icon-reply icon-large"></i></a>
    <a href = "?page=logout" title="Выход"><i class="icon-off icon-large"></i></a>
    <span id = "time"><?php today();?></span>
</div><!--navigation-->

<?php

// создаем новые обьекты
$vsettings = new app\classes\CSettings(); //для работы с настройками
$vcreateeditpage = new \app\classes\CPageCreateEdit(); //для работы со страницами
$vcreateeditauth = new \app\classes\CAuthCreateEdit(); //для работы с пользователями
$vcreateeditmenu = new \app\classes\CMenuCreateEdit(); //для работы с меню
$vcreateeditnews = new \app\classes\CNewsCreateEdit(); //для работы с новостями

// если от пользователя получены данные из формы
if ($_POST)
{
    //EDIT_SETTINGS
    if ($_GET['page'] == 'settings')
    {
        $vsettings->saveSettings($_POST);
    }
    //ALL_CREATE
    elseif ($_GET['page'] == 'createPage')
    {
        $vcreateeditpage->createPage($_POST);
    }
    elseif ($_GET['page'] == 'createMenu')
    {
        $vcreateeditmenu->createMenu($_POST);
    }
    elseif ($_GET['page'] == 'createAuth')
    {
        $vcreateeditauth->createAuth($_POST);
    }
    elseif ($_GET['page'] == 'createNews')
    {
        $vcreateeditnews->createNews($_POST);
    }
    //ALL_EDIT
    elseif ($_GET['editMenu'])
    {
        $vcreateeditmenu->updateMenu($_GET['editMenu'], $_POST);
    }
    elseif ($_GET['editPage'])
    {
        $vcreateeditpage->updatePage($_GET['editPage'], $_POST);
    }
    elseif ($_GET['editAuth'])
    {
        $vcreateeditauth->updateAuth($_GET['editAuth'], $_POST);
    }
    elseif ($_GET['editNews'])
    {
        $vcreateeditnews->updateNews($_GET['editNews'], $_POST);
    }
}
// Маршрутизатор

// если нажата кнопка, подключаем соответствующие виды
if ($_GET)
{
    if(isset($_GET['page']))
    {
        // быстрое сравнение $_GET['page']:
        switch ($_GET['page'])
        {
            //SETTINGS
            case 'settings':
                require_once "views/VSettings.php";
                break;

            //HELP
            case 'help':
                require_once "views/VHelp.php";
                break;

            //ALL_LISTS
            case 'pageList':
                require_once "views/VPageList.php";
                break;
            case 'authList':
                require_once "views/VAuthList.php";
                break;
            case 'menuList':
                require_once "views/VMenuList.php";
                break;
            case 'newsList':
                require_once "views/VNewsList.php";
                break;

            //ALL_CREATE
            case 'createPage':
                require_once "views/VPageCreate.php";
                break;
            case 'createAuth':
                require_once "views/VAuthCreate.php";
                break;
            case 'createMenu':
                require_once "views/VMenuCreate.php";
                break;
            case 'createNews':
                require_once "views/VNewsCreate.php";
                break;
        }
    }
    else
    {
        // поскольку здесь требуется сравнение ключей $_GET,
        // "добываем" их с помощью foreach:
        foreach ($_GET as $key => $value)
        {
            $page = $key;
        }

        // и снова - быстрое сравнение:
        switch ($page)
        {
            //ALL_DELETE
            case 'deletePage':
                require_once "views/VPageDelete.php";
                break;
            case 'deleteAuth':
                require_once "views/VAuthCheck.php";
                break;
            case 'deleteMenu':
                require_once "views/VMenuDelete.php";
                break;
            case 'deleteNews':
                require_once "views/VNewsDelete.php";
                break;
            //ALL_EDIT
            case 'editMenu':
                require_once "views/VMenuEdit.php";
                break;
            case 'editAuth':
                require_once "views/VAuthCheck.php";
                break;
            case 'editPage':
                require_once "views/VPageEdit.php";
                break;
            case 'editNews':
                require_once "views/VNewsEdit.php";
                break;
        }
    }
}