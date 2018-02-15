<?php
$sql = "SELECT * FROM `info`";
echo $sql;
$select = \app\classes\Db::getInstance()->sql($sql);
