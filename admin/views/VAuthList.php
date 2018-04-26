<div class="div-center" id="usersList_table">
    <div class='row usersList'>
        <div class='col-md-4'>Логин</div>
        <div class='col-md-2'>Редактировать</div>
        <div class='col-md-2'>Удалить</div>
        <div class='col-md-1'><input type='checkbox' class="selectAll"></div>
    </div>
    <?php
    $auth = $vcreateeditauth->get_auth();

    foreach ($auth as $value)
    {
        echo "<div class='row user_list_table_row'>
        <div class='col-md-4'><a href='?editAuth={$value['id']}'>{$value['login']}</a></div>
        <div class='col-md-2'><a href='?editAuth={$value['id']}'><span class=\"glyphicon glyphicon-pencil\"></span></a></div>
        <div class='col-md-2'><a href='?deleteAuth={$value['id']}'><span class=\"glyphicon glyphicon-trash\"></span></a></div>
        <div class='col-md-1'><input type='checkbox' name='user[]' value='{$value['id']}'></div>
    </div>";
    }
    ?>
</div>