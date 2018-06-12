<?php
namespace app\classes;


class MTopMenu
{
    protected function get_all_pages_for_top_menu()
    {
        $sql = "SELECT id, menu_icon, icon_size, menu_name, parent_id FROM pages WHERE visible_at_top_menu = '1' AND general_visible = '1' ORDER BY position";
        $response = Db::getInstance()->sql($sql);

        return $response;
    }
}