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
require_once "Views/VRedactor.php";
require_once "Views/VMenu.php";
for ($i=1;$i<1000;$i++){
    echo $i.'<br>';
}
// Router
if ($_GET)
{
    if ($_GET['page'])
    {

    }
}
elseif ($_POST)
{

}