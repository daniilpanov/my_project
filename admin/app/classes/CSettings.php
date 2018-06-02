<?php
namespace app\classes;


class CSettings extends MSettings
{
    public function prepareSettings()
    {
        $response = $this->getSettings();
        $result = mysqli_fetch_assoc($response);
        return $result;
    }

    public function saveSettings($id, $post)
    {
        //Начало запроса:
        $sql = "UPDATE constants SET ";
        //Считаем эл. массива place(колонки в таблице, которые надо изменить)
        $count = count($post);
        // переменная для счёта
        $counter = 0;
        //Перебираем place как ключ и значение
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)//если это - не конечный эл. массива, то
            {
                //формируем две вот такую часть запроса:
                $val = str_replace("'", "&prime;", $val);
                $val = str_replace('"', '&Prime;', $val);
                $sql .= $key."='{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечную часть запроса
                $val = str_replace("'", "&prime;", $val);
                $val = str_replace('"', '&Prime;', $val);
                $sql .= $key."='{$val}' ";
            }
        }
        // и соединяем их
        $sql .=" WHERE id = '{$id}'";
    }
}