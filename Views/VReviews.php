<div id="review">
    <div class="user_name review">
        <p><u>Ваше имя:</u></p>
        <input type="text" name="user_name" placeholder="Ваше имя">
    </div>
    <br>
    <div id="reviewStars-input">
        <p><u>Оценка:</u></p>
        <input id="star-4" type="radio" name="reviewStars" value="5">
        <label title="Great" for="star-4"></label>

        <input id="star-3" type="radio" name="reviewStars" value="4">
        <label title="good" for="star-3"></label>

        <input id="star-2" type="radio" name="reviewStars" value="3">
        <label title="normal" for="star-2"></label>

        <input id="star-1" type="radio" name="reviewStars" value="2">
        <label title="bad" for="star-1"></label>

        <input id="star-0" type="radio" name="reviewStars" value="1">
        <label title="awful" for="star-0"></label>
    </div>
    <br>
    <div class="review e-mail">
        <p><u>Ваш e-mail:</u></p>
        <input type="email" name="e-mail" placeholder="Ваш адрес эл. почты">
    </div>
    <br>
    <div class="review font">
        <p><u>Текст отзыва:</u></p>
        <input type="text" name="font" placeholder="Заголовок">
    </div>
    <br>
    <div class="review bottom">
        <input type="text" name="bottom" placeholder="Текст отзыва"><input type="submit" value="Отправить отзыв">
    </div>
</div>

<?php
for ($i=1,$c=2;$i<$c;$c++,$i++)
{
    $id = 1;
    $sql = "SELECT * FROM reviews WHERE id={$id}";
    if (!empty($sql))
    {
        $id++;
    }
}
