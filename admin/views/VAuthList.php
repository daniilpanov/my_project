<?php
//call to method get_auth (this name is talking about value this method)
$auth = $vcreateeditauth->getAllAuth();
?>
<!--СДЕСЬ НЕЧЕГО КОММЕНТИРОВАТЬ(итак всё понятно)-->
<div class="create"><a href="?page=createAuth"><span class="icon-plus-sign icon-large mysubmenu"></span></a></div>
<div id="list_table">
    <div class='row list_table_header'>
        <div class='col-md-4'>Логин</div>
        <div class='col-md-2'>Редактировать</div>
        <div class='col-md-2'>Удалить</div>
        <div class='col-md-1'><input type='checkbox' class="selectAll"></div>
    </div>
    <?php
    foreach ($auth as $value)
    {
        echo "<div class='row list_table_row'>
        <div class='col-md-4'><a href='?editAuth={$value['id']}'>{$value['login']}</a></div>
        <div class='col-md-2'><a href='?editAuth={$value['id']}'><span class=\"glyphicon glyphicon-pencil\"></span></a></div>
        <div class='col-md-2'><a href='?deleteAuth={$value['id']}'><span class=\"glyphicon glyphicon-trash\"></span></a></div>
        <div class='col-md-1'><input type='checkbox' name='user[]' value='{$value['id']}'></div>
    </div>";
    }
    ?>
</div>