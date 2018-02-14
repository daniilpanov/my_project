<?php
echo $sql = "SELECT * FROM `font`";
$select = \app\classes\Db::getInstance()->sql($sql);
