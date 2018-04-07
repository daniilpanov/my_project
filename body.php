<body>
<header>
    <div style="text-align: center;">
        <table id="header">
            <tr>
                <!--Логотип сайта-->
                <td id="logo" class="col-3">
                    <img src="img/compass_pic.png" width="100" height="100" border="0">
                </td>
                <!--Название сайта-->
                <td id="siteName" class="col-8">
                    <h1>MY PROJECT</h1>
                </td>
            </tr>
        </table>
    </div>
</header>
<?php
require_once "views/VMenu.php";
?><div class='content'>
    <?=$content['content']?>
</div><?php

// Router
if ($_GET)
{

}
elseif ($_POST)
{

}