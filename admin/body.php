<body>
<header>
    <div id="header">
        <div id="logo"><img src="img/pirate-bay.jpg" width="100" height="100"></div>
        <div id="siteName">
            <h1>MY PROJECT</h1>
        </div>
    </div>
</header>
<?php
require_once "views/VMenu.php";
if ($_GET)
{
    if($_GET['doing'])
    {
        if ($_GET['doing'] == 'create')
        {
            require_once "views/VCreate.php";
        }
        elseif ($_GET['doing'] == 'seeMenu')
        {

        }
        elseif ($_GET['doing'] == 'seePages')
        {

        }
        elseif ($_GET['doing'] == 'seeFav')
        {

        }
        elseif ($_GET['doing'] == 'addFav')
        {

        }
    }
}