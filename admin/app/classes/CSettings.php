<?php
namespace app\classes;


class CSettings extends MSettings
{
    public function prepareSettings()
    {
        $response = $this->getSettings();
        while ($row = mysqli_fetch_assoc($response))
        {
            $result[$row['name']] = $row;
        }
        return $result;
    }

    public function saveSettings($post)
    {
        foreach ($post as $value)
        {
            //Начало запроса:
            $sql = "UPDATE constants SET ";
            //Считаем эл. массива place(колонки в таблице, которые надо изменить)
            $count = count($value);
            // переменная для счёта
            $counter = 0;
            //Перебираем place как ключ и значение
            foreach ($value as $key => $val)
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
            $sql .= " WHERE name = '{$value['name']}'";
//            echo $sql."<br>";//для отладки
            $this->insertSettings($sql);
        }
    }
}