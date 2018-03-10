<div class="checkYourDoing">
    <form method="post">
        <input id="delete" class="doing" type="radio" name="doing[]" value="delete" hidden><label for="delete"><img src="img/trash-var-outline.png" width="20" height="25"></label>
        <input id="add" class="doing" type="radio" name="doing[]" value="add" hidden><label for="add"><img src="" width="20" height="25"></label>
    </form>
    <a href="?view=<?=$_POST['pageId']?>" class="doing"><img src="" width="20" height="25"><i><b>ПРОСМОТРЕТЬ СТРАНИЦУ</b></i></a>
</div>
<?php
