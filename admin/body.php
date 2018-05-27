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
</div><!--navigation-->

<?php

// создаем новые обьекты
$vcreateeditpage = new \app\classes\CPageCreateEdit(); //для работы со страницами
$vcreateeditauth = new \app\classes\CAuthCreateEdit(); //для работы с пользователями
$vcreateeditmenu = new \app\classes\CMenuCreateEdit(); //для работы с меню
$vcreateeditnews = new \app\classes\CNewsCreateEdit(); //для работы с новостями

// если от пользователя получены данные из формы
if ($_POST)
{
    //ALL_CREATE
    if ($_GET['page'] == 'createPage')
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
    //ALL_EDIT
    elseif ($_GET['editMenu'])
    {
        $vcreateeditmenu->updateMenu($_GET['editMenu'], $_POST);
    }
    elseif ($_GET['editPage'])
    {
        $vcreateeditpage->updatePage($_GET['editPage'], $_POST);
    }
    elseif ($_GET['editUser'])
    {
        $vcreateeditauth->updateAuth($_GET['editUser'], $_POST);
    }
}
// Маршрутизатор

// если нажата кнопка, подключаем соответствующие виды
if ($_GET)
{
    if($_GET['page'])
    {
        //ALL_LISTS
        if ($_GET['page'] == 'pageList')
        {
            require_once "views/VPageList.php";
        }
        elseif ($_GET['page'] == 'authList')
        {
            require_once "views/VAuthList.php";
        }
        elseif ($_GET['page'] == 'menuList')
        {
            require_once "views/VMenuList.php";
        }
        elseif ($_GET['page'] == 'newsList')
        {
            require_once "views/VNewsList.php";
        }
        //ALL_CREATE
        elseif ($_GET['page'] == 'createPage')
        {
            require_once "views/VPageCreate.php";
        }
        elseif ($_GET['page'] == 'createAuth')
        {
            require_once "views/VAuthCreate.php";
        }
        elseif ($_GET['page'] == 'createMenu')
        {
            require_once "views/VMenuCreate.php";
        }
    }
    //ALL_DELETE
    elseif ($_GET['deletePage'])
    {
        require_once "views/VPageDelete.php";
    }
    elseif ($_GET['deleteAuth'])
    {
        require_once "views/VAuthDelete.php";
    }
    elseif ($_GET['deleteMenu'])
    {
        require_once "views/VMenuDelete.php";
    }
    //ALL_EDIT
    elseif ($_GET['editMenu'])
    {
        require_once "views/VMenuEdit.php";
    }
    elseif ($_GET['editAuth'])
    {
        require_once "views/VAuthCheck.php";
    }
    elseif ($_GET['editUser'])
    {
        require_once "views/VAuthEdit.php";
    }
    elseif ($_GET['editPage'])
    {
        require_once "views/VPageEdit.php";
    }
}

