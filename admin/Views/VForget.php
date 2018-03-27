<div id="page">
    <center>
        <form method="post" class="get">
            <?php
            if (!$_POST)
            {
                ?>
            <style>
                #beforeForm
                {
                    display: block;
                }
                #form
                {
                    display: none;
                }
            </style><!--Если нет $_POST, то делаем первую форму видимой, а вторую - невидимой-->
            <div id='beforeForm'>
                Что Вы забыли?
                <form method='post'>
                    <table id='get'>
                        <tr>
                            <td><u>Логин</u></td><td><input type='radio' name='get' value='login'></td>
                            <td><u>Пароль</u></td><td><input type='radio' name='get' value='password'></td>
                        </tr>
                    </table>
                    <input type='submit' value='Продолжить' name='then'>
                </form>
            </div><?php
            }
            elseif ($_POST['then'])
            {
                ?>
            <style>
                #beforeForm
                {
                    display: none;
                }
                #form
                {
                    display: block;
                }
            </style><!--Если есть $_POST['then'], то делаем первую форму невидимой, а вторую - видимой-->
                <div id='form'>
                <h2>Для того, чтобы получить <?=$_POST['get']?>,<br>Вам надо заполнить следующие поля:</h2>
                <table id='get'>
                    <tr>
                        <td><u>ФИ</u></td><td><input type='text' name='surname&name' placeholder='ФИ'></td>
                        <td><u>E-mail</u></td><td><input type='email' name='email' placeholder='E-mail'></td>
                    </tr>
                </table>
                <input type='submit' name='goToGet' value='Продолжить'><?php
            }
            elseif ($_POST['goToGet'])
            {
                //Создаём объект класса CForget
                $ToGet = new \app\classes\CForget();//Не видит класс!!!
                //И вызываем его метод get
                $gotPas = $ToGet->get($_POST['surname&name'],$_POST['email'],$_POST['get']);
            }
            ?>
        </form>
    </center>
</div>