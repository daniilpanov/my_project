<?php
namespace app\classes;


class CMenu extends MMenu
{
    public function prepareMenu()
    {
        //Метод для запроса к базе данных
        $response = $this->getMenu();

        //В цикле записываем результат, приведённый к массиву в массив $endResponse
        while ($row = mysqli_fetch_assoc($response))
        {
            $endResponse[] = $row;
        }

        //Возвращаем конечный результат
        return $endResponse;
    }


    public function preparePages()
    {
        //Метод для запроса к базе данных
        $response = $this->getPages();

        //В цикле записываем результат, приведённый к массиву в массив $endResponse
        while ($row = mysqli_fetch_assoc($response))
        {
            $endResponse[] = $row;
        }

        //Возвращаем конечный результат
        return $endResponse;
    }

    // возвращаем меню с БД
    public function get_menu_from_DB($menu_number){

        $res = $this->return_menu($menu_number); // запрос к БД
        while ($row = mysqli_fetch_array($res))
        {
            $mname[$row['id']] = $row;
        }
        return $mname;
    }

}