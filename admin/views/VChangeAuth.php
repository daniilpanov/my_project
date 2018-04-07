<div class='row usersList'>
    <div class='col-md-1'>Id</div>
    <div class='col-md-3'>Логин</div>
    <div class='col-md-2'>Редактировать</div>
    <div class='col-md-2'>Удалить</div>
    <div class='col-md-1'><input type='checkbox' class="selectAll"></div>
</div>
<?php
$auth = $vgetauth->get_auth();

foreach ($auth as $value)
{
    echo "<div class='row'>
        <div class='col-md-1'>{$value['id']}</div>
        <div class='col-md-3'>{$value['login']}</div>
        <div class='col-md-2'><a href='?editAuth={$value['id']}'><span class=\"glyphicon glyphicon-pencil\"></span></a></div>
        <div class='col-md-2'><a href='?deleteAuth={$value['id']}'><span class=\"glyphicon glyphicon-trash\"></span></a></div>
        <div class='col-md-1'><input type='checkbox' name='user[]' value='{$value['id']}'></span></a></div>
    </div>";
}