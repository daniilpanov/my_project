<?php
$vsettings = new app\classes\CSettings(); //для работы с настройками
$site_name = $vsettings->prepareSettings();
define('SITE_NAME', $site_name['site_name']['value']);