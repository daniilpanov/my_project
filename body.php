<body>
<div class="col-md-4 first"><img src="img/pirate-bay.jpg"></div>
<div class="col-md-7 first">
    <h1>MY PROJECT</h1>
</div>
<?php
require_once "menu.php";

// Router
if ($_GET)
{
    if ($_GET['page'])
    {
        if ($_GET['page'] == "reviews")
        {
            require_once "Views/VReviews.php";
        }
        elseif ($_GET['page'] == "info")
        {

        }
    }
}
elseif ($_POST)
{

}