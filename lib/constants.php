<?php
$constants = new \app\classes\CConstants();
$site_name = $constants->returnSiteName();
define('SITE_NAME', $site_name);