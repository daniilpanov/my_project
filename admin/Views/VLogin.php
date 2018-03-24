<!--Просто форма-->

<form method="post">
    <h2>Для того, чтобы войти как админисратор,<br>Вам надо заполнить следующие поля:</h2>
    <table id="login">
        <tbody>
        <tr>
            <td><u>Фамилия, имя</u><input type="text" placeholder="Ваши фамилия, имя" name="name"></td>
            <td><u>E-mail</u><input type="email" placeholder="Ваш e-mail" name="email"></td>
        </tr>
        <tr>
            <td><u>Логин</u><input type="text" name="login" placeholder="Логин">
            <td><u>Пароль</u><input type="password" name="password" placeholder="Пароль"></td>
        </tr>
        </tbody>
    </table>
    <input type="submit" name="authorisation" value="Продолжить">
</form>