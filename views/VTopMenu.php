<nav id="topMenu" class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Меню</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav topPages">
            <li class="active"><a href="index.php">Главная</a></li>
            <li><a href="?all=news">Все новости</a></li>
            <?php
            // ПОДГОТАВЛИВАЕМ МАССИВЫ СТРАНИЦ ДЛЯ ФОРМИРОВАНИЯ МЕНЮ

            // подготавливаем массив всех страниц для определённого меню $all_pages[id] = array(страница со всеми полями с этим id);
            $all_pages = $topPages->get_all_top_pages();//Список страниц

            // подготавливаем массив дочерных страниц $children[$all_pages["id"]] = $all_pages["parent_id"]
            // например, $children[3] = 1;
            $children = $topPages->prepare_children($all_pages);

            // выводим каждую страницу меню
            foreach ($all_pages as $item_page)
            {
                // если элемент не является дочерным элементом, выводим его
                if(!$item_page["parent_id"])
                {
                    echo $topPages->print_item($item_page, $all_pages, $children);
                }
            }
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <!--ВАЖНО!!!-->
                <!--!Поскольку в форме не указан метод, по умолчанию стоит method="get"!-->
                <form id="search" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="Search" name="search">
                    </div>
                    <button type="submit" class="btn btn-default">Поиск</button>
                </form>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
