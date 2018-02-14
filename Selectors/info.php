<?php
echo $sql = "SELECT * FROM `info`";
$select = \app\classes\Db::getInstance()->sql($sql);
