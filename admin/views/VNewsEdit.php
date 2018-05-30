<?php
//Инф. обо всех меню(для выбора, в каком меню будет состоять страничка)
$oneNews = $vcreateeditnews->getOneNews($_GET['editNews']);
?>
<!--Форма для создания странички-->
<div class="create">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">название новости (name of the news):</div>
            <div class="col-md-4"><input type="text" name="name" value="<?=$oneNews['name']?>" required></div>
        </div>
        <div class="row">
            <div class="col-md-4">заголовок новости (title):</div>
            <div class="col-md-4"><input type="text" value="<?=$oneNews['title']?>" name="title"></div>
        </div>
        <div class="row">
            <div class="col-md-4">ключевые слова (keywords):</div>
            <div class="col-md-4"><input type="text" value="<?=$oneNews['keywords']?>" name="keywords"></div>
        </div>
        <div class="row">
            <div class="col-md-4">описание (description):</div>
            <div class="col-md-4"><textarea name="description" spellcheck="false" required><?=$oneNews['description']?></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4">картинка (image):</div>
            <div class="col-md-4"><input name="image" type="file" accept="image/*"></div>
        </div>
        <div class="row">
            <div class="col-md-4">размер картинки (image size):</div>
            <div class="col-md-4"><input type="number" name="image_width" value="<?=$oneNews['image_width']?>"></div>
        </div>
        <div style="margin: 1em">картинка:<img src="../<?=$oneNews['image']?>" width="<?=$oneNews['image_width']?>" alt="картинки нет"></div>
        <div class="row">
            <div class="col-md-4">содержание новости (content of this news):</div>
            <div class="col-md-4"><textarea name="content" spellcheck="false"><?=$oneNews['content']?></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><input type="submit" value="Сохранить"></div>
        </div>
        <!--для меньшего размера кода-->
        <input type="hidden" name="updated" value="<?=time()?>">
    </form>
</div>
