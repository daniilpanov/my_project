<?php
/**
* @filename install.php
* создание таблиц и заполнение первоначальными данными
* @author Клуб интеллектуалов
* @copyright 01.04.2014
* @updated 28.12.2017
*/
?>
<!DOCTYPE html>
<html lang="ru">

<head>

    <!--Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <!--End Meta-->

    <title>Установка...</title>

    <!--CSS-->
    <link href="style/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="style/style.css" rel="stylesheet" />
    <!--End CSS-->

    <!--Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Marck+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!--End Fonts-->

    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" />
    <!--End Favicon-->

    <!--Java scripts-->
    <script type="text/javascript" src="admin/js/jquery/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="admin/js/jquery/jquery.cookie.js"></script>
    <!--End Java scripts-->

    <!--Bootstrap-->
    <script src="admin/js/bootstrap/bootstrap.min.js"></script>
    <!--End Bootstrap-->

</head>

<body>

<?php

function __autoload($name)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);
    require_once($name.'.php');
}
// если впервые запущена установка рисуем форму
if(!$_POST['domain_name'])
{?>
<div class="container-fluid">
    <div id="parent">
        <div id="child">
            <form class="form-inline" method="post">

                <h4>Название вашего домена</h4>

                <div class="form-group" >
                    <label class="sr-only" for="domain_name">название домена</label>
                    <input type="text" class="form-control"  id="domain_name" placeholder="http://domainname" name="domain_name">
                </div>

                <h4>Настройки для подключения к серверу БД</h4>

                <div class="form-group">
                    <label class="sr-only" for="db_server_adress">адрес сервера БД</label>
                    <input type="text" class="form-control" id="db_server_adress" placeholder="адрес сервера БД" name="db_server_adress">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="db_database_name">название БД</label>
                    <input type="text" class="form-control" id="db_database_name" placeholder="название БД" name="db_database_name">
                </div>

                <br>

                <div class="form-group">
                    <label class="sr-only" for="db_user_name">имя пользователя</label>
                    <input type="text" class="form-control" id="db_user_name" placeholder="имя пользователя" name="db_user_name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="db_user_password">пароль</label>
                    <input type="password" class="form-control" id="db_user_password" placeholder="пароль" name="db_user_password">
                </div>

                <br>
                <input type="submit" class="btn btn-primary" value="Далее">
            </form>
        </div>
    </div>
</div>
<?php
die();
}
$domain_name = $_POST['domain_name'];
$email = $_POST['email'];
$db_server_adress = $_POST['db_server_adress'];
$db_database_name = $_POST['db_database_name'];
$db_user_name = $_POST['db_user_name'];
$db_user_password = $_POST['db_user_password'];
// проверяем заполнил ли пользователь все поля
if (empty($domain_name)|| empty($db_server_adress)|| empty($db_database_name)|| empty($db_user_name)|| empty($db_user_password)){
    die("Вы ввели не всю необходимую информацию <a href='install.php'>Попробовать еще раз</a>");
}
// генерируем текст файла настроек для подключения к БД
$file_contents = '<?php
namespace app\classes;
     
class Config
{
    const DB_HOST = "';
$file_contents .= $db_server_adress;
$file_contents .= '"; // адрес сервера БД
    const DB_USER = "';
$file_contents .= $db_user_name;
$file_contents .= '"; // имя пользователя 
    const DB_PASS = "';
$file_contents .= $db_user_password;
$file_contents .= '"; // пароль пользователя
    const DB_NAME = "';
$file_contents .= $db_database_name;
$file_contents .= '"; // название БД
    const SQLCHARSET = "utf8"; // кодировка БД
}';

// напишем функцию для создания файла
function create_db_settings_file($file_path,$contents){
    if (!file_exists($file_path))
    {
        $handle = fopen($file_path,"a");
        fwrite($handle,"");
        fclose($handle);
    }
    if (filesize($file_path)==0)
    {
        $handle = fopen($file_path,"a");
        fwrite($handle,$contents);
        fclose($handle);
    }
}
// задаем имя файлов настроек которые необходимо создать
define('MYNAME','app/classes/Config.php');
define('MYNAME2','admin/app/classes/Config.php');
// создадим эти файлы
create_db_settings_file(MYNAME,$file_contents);
create_db_settings_file(MYNAME2,$file_contents);
// подготовим запросы для создания новых таблиц

// структура таблицы 'news'
$news = "CREATE TABLE IF NOT EXISTS `news` (
                     `id` INT(4) NOT NULL AUTO_INCREMENT,
                     `title` VARCHAR(255),
                     `content` LONGTEXT,
                     `image` varchar(255),
					 `image_width` INT(4),
					 `name` VARCHAR(255) UNIQUE,
					 `created` INT(255) NOT NULL,
					 `updated` INT(255),
					 `keywords` VARCHAR(255),
					 `description` MEDIUMTEXT,
                     PRIMARY KEY (`id`)
                     ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// структура таблицы 'menus'
$menus = "CREATE TABLE IF NOT EXISTS `menu` (
                     `id` int(3) NOT NULL AUTO_INCREMENT,
                     `name` VARCHAR(255) NOT NULL,
					 `position` INT(255),
					 `created` INT(255) NOT NULL,
					 `updated` INT(255),
					 `icon` VARCHAR(255),
					 `icon_size` VARCHAR(255),
                     PRIMARY KEY (id)
                     ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// структура таблицы 'pages'
$pages = "CREATE TABLE IF NOT EXISTS `pages` (
                 `id` INT(11) NOT NULL AUTO_INCREMENT,
                 `description` TEXT,
                 `position` INT(255),
                 `keywords` TEXT,
                 `title` VARCHAR(255),
				 `menu_icon` VARCHAR(255),
				 `icon_size` VARCHAR(255),
				 `menu_number` INT(4) NOT NULL,
                 `menu_name` VARCHAR(255) NOT NULL,
                 `content` LONGTEXT,
                 `created` INT(255) NOT NULL,
                 `updated` INT(255),
                 PRIMARY KEY (id)
                 ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// структура таблицы 'reviews'
$reviews = "CREATE TABLE IF NOT EXISTS `reviews` (
                `id` INT(4) NOT NULL AUTO_INCREMENT,              
                `page_id` INT(4) NOT NULL,
                `name` VARCHAR(255) NOT NULL,
                `review` TEXT,
                `author` VARCHAR(255),
                `email` VARCHAR(255) NOT NULL,
                `visible` ENUM('0','1') NOT NULL,
                `state` VARCHAR(255),
                `created` INT(255) NOT NULL,
                `updated` INT(255),
                `rating` INT(1),
                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

// структура таблицы 'users'
$users = "CREATE TABLE IF NOT EXISTS `users` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `login` VARCHAR(255) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
// Подключаемся к БД
$mydbobj = \app\classes\Db::getInstance();
// создаем таблицы в существующей БД
echo "Создаем таблицы в базе данных ".$db_database_name." ...";
if(
    $mydbobj->sql($news)
    && $mydbobj->sql($menus)
    && $mydbobj->sql($pages)
    && $mydbobj->sql($reviews)
    && $mydbobj->sql($users)
)
{
    echo "OK<br />";
}
else
{
    echo "Ошибка при создании таблиц<br />";
}

// подготовим дампы данных созданных таблиц
$dt = time(); // текущая метка времени
// menu
$addmenuRu = "insert into
					menu(`id`,`name`,`position`,`created`)
        			VALUES('1','Мы предлагаем','1','{$dt}')";

$addmenuEn = "insert into
					menu(`id`,`name`,`position`,`created`)
        			VALUES('2','We offer','2','{$dt}')";

// pages
$addpageRu1 = "insert into
					pages(`menu_icon`,`icon_size`,`menu_number`,`menu_name`,`position`,`content`,`created`,`title`)
        			VALUES('icon-home','icon-large','1','Главная','1','Главная','{$dt}','адрес сайта | Ключевое слово | Главная')";
$addpageRu2 = "insert into
					pages(`menu_number`,`menu_name`,`position`,`content`,`created`,`title`)
        			VALUES('1','Пример страницы','2','Пример страницы','{$dt}','адрес сайта | Ключевое слово | Пример страницы')";
// users
$adduser = "insert into
					users(`login`, `password`)
    				VALUES('admin','da9d630b967d7838f404957cb79b7c27')";

// добавляем данные в созданные таблицы
echo "Добавляем первоначальные данные в созданные таблицы...";
if($mydbobj->sql($addmenuRu)
    && $mydbobj->sql($addmenuEn)
    && $mydbobj->sql($addpageRu1)
    && $mydbobj->sql($addpageRu2)
    && $mydbobj->sql($adduser)
)
{
    echo "OK<br />";
}
else
{
    echo "Ошибка при добавлении первоначальных данных<br /><br />";
}

// удаляем установщик для предотвращения повторного добавления первоначальных данных
echo 'Удаляем установщик...OK<br />Готово!<br />';
echo "<a href=\"$domain_name\">Перейти на сайт</a>&nbsp;|&nbsp; <a href=\"{$domain_name}\admin\">Система администрирования</a>";
// !!!РАЗКОММЕНТИРУЙТЕ НА РАБОЧЕМ ПРОЭКТЕ
// unlink('install.php');
// unlink('Установка.txt');
?>