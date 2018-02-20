<body>
<div class="col-md-4 first"><img src="img/pirate-bay.jpg"></div>
<div class="col-md-7 first">
    <h1>MY PROJECT</h1>
</div>
<?php
require_once "Views/VMenu.php";
echo "<div class='content'>";
echo $content['content'];
echo "</div>";
// Router
if ($_GET)
{
    if ($_GET['page'] == 3)
    {
        require_once "Views/VReviews.php";
    }
}
elseif ($_POST)
{

}