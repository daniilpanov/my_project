<body>
<header>
    <div id="header">
        <div id="logo"><img src="img/compass_pic.png" width="100" height="100"></div>
        <div id="siteName">
            <h1>MY PROJECT</h1>
        </div>
    </div>
</header>
<?php
require_once "views/VMenu.php";
echo "<div class='content'>";
echo $content['content'];
echo "</div>";
// Router
if ($_GET)
{

}
elseif ($_POST)
{

}