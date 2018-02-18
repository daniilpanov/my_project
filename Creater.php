<?php
$text = 'text';
$fo = fopen('test2.php','w');
fwrite($fo,$text);
fclose($fo);