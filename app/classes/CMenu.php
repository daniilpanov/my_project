<?php
namespace app\classes;


class CMenu extends MMenu
{
    public function prepareMenu($id)
    {
        //Редактируем переменную id так, чтобы выполнился правильный запрос
        $id = 1+(5*$id-5);

        //Метод для запроса к базе данных
        $response = $this->getMenu($id);

        //В цикле записываем результат, приведённый к массиву в массив $endResponse
        foreach ($response as $value)
        {
            $endResponse[] = mysqli_fetch_assoc($value);
        }

        //Возвращаем конечный результат
        return $endResponse;
    }
}