<?php
$all_pages = $vcreateeditpage->getAllPages(true);
foreach ($all_pages as $one_page)
{
    if ($one_page['menu_name'] == 'help')
    {
        $content = $one_page['content'];
        break;
    }
}
?>
<div>
    <?=$content?>
</div>
