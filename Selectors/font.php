<?php
$sql = "SELECT * FROM `font`";
echo $sql;
$select = \app\classes\Db::getInstance()->sql($sql);
