<!DOCTYPE html>
<html lang="ru">
<head rel="stylesheet">
    <style rel="stylesheet" type="text/css" media="all">
        #error
        {
            background-image: -webkit-linear-gradient(to bottom right, #ffee00 40%,#000034 60%);
            background-image:    -moz-linear-gradient(to bottom right, #ffee00 40%,#000034 60%);
            background-image:     -ms-linear-gradient(to bottom right, #ffee00 40%,#000034 60%);
            background-image:         linear-gradient(to bottom right, #ffee00 40%,#000034 60%);
            float: left;
            border: 5px solid black;
            border-bottom-color: gray;
            border-left-color: gray;
            padding: 10px;
        }
        #error p#errorCode
        {
            color: lightblue;
            font-size: 75px;
        }
        #error i
        {
            font-size: 85px;
        }
        #error p#menu
        {
            padding: 5px;
            background-color: green;
            color: darkred;
            font-size: 15px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        p#menu span
        {
            font-size: 25px;
        }
        #error ul
        {
            display: none;
            font-size: 20px;
            text-align: center;
        }
        body
        {
            background: url("img/3-d-blue-cubes-wallpaper-1920x1080.jpg");
        }
        #page
        {
            height: auto;
        }
        #onclick
        {
            color: whitesmoke;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-size: 40px;
        }
    </style>
</head>
<body>
<div id="page">
    <div id="error">
        <p id="errorCode"><u><b><i>error</i>: 404</b></u></p>
        <p id="menu" onclick="document.getElementById('dropDown').style.display='block';"
           ondblclick="document.getElementById('dropDown').style.display='none';">
            Возможные причины:<span>&downarrow;</span>
        </p>
        <ul id="dropDown">
            <li>неправильно введённый адрес страницы</li>
            <li>страница удалена</li>
            <li>баг на сервере</li>
        </ul>
    </div>
    <div id="onclick" onclick="document.location.href='http://localhost/my_project/'">
        <strong>
            <i>
                <u>
                    ВЕРНУТЬСЯ НА ГЛАВНУЮ СТРАНИЦУ
                </u>
            </i>
        </strong>
    </div>
</div>
</body>
</html>