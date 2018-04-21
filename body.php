<body>
<header>
    <div style="text-align: center;">
        <table id="header">
            <tr>
                <!--Логотип сайта-->
                <td id="logo" class="col-3">
                    <img src="img/compass_pic.png" width="100px" height="100px" border="0">
                </td>
                <!--Название сайта-->
                <td id="siteName" class="col-8">
                    <h1>MY PROJECT</h1>
                </td>
            </tr>
        </table>
    </div>
</header>
<div class="row">
<?php
require_once "views/VMenu.php";
?><div class='col-md-7' id="content">
    <?php
    if (!$_GET || $_GET['page'])
    {
        echo $content['content'];
    }
    ?>
</div><?php

// Router
if ($_GET)
{
    ?>
    <div class='col-md-7' id="content">
    <?php
    if ($_GET['news'])
    {
        echo $NContent['content'];
    }
    ?>
    </div>
    <?php
}
elseif ($_POST)
{

}
?>
</div>
