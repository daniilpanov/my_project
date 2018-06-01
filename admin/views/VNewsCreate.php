<!--Форма для создания странички-->
<div class="create">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">название новости (name of the news):</div>
            <div class="col-md-4"><input type="text" name="name" required></div>
        </div>
        <div class="row">
            <div class="col-md-4">заголовок новости (title):</div>
            <div class="col-md-4"><input type="text" name="title"></div>
        </div>
        <div class="row">
            <div class="col-md-4">ключевые слова (keywords):</div>
            <div class="col-md-4"><input type="text" name="keywords"></div>
        </div>
        <div class="row">
            <div class="col-md-4">описание (description):</div>
            <div class="col-md-4"><textarea name="description" spellcheck="false" required></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4">картинка (image):</div>
            <div class="col-md-4"><input name="image" type="file" accept="image/*"></div>
        </div>
        <div class="row">
            <div class="col-md-4">размер картинки (image size):</div>
            <div class="col-md-4"><input type="number" name="image_width"></div>
        </div>
        <div class="row">
            <div class="col-md-4">ед.измерения:</div>
            <div class="col-md-4">
                <select name="type_of_measure_unit">
                    <option value="px" selected>px</option>
                    <option value="%">%</option>
                    <option value="ex">ex</option>
                    <option value="em">em</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                    <option value="in">in</option>
                    <option value="pt">pt</option>
                    <option value="pc">pc</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">содержание новости (content of this news):</div>
            <div class="col-md-4"><textarea name="content" spellcheck="false"></textarea></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"> <input type="submit" value="Добавить"></div>
        </div>
        <!--для меньшего размера кода-->
        <input type="hidden" name="created" value="<?=time()?>">
    </form>
</div>
