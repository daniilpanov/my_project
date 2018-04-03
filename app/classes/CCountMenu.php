<?php
namespace app\classes;


class CCountMenu extends MCountMenu
{
    public function countMenu()
    {
        //Метод для запроса всех id для последующего подсчёта
        $response = $this->getCounter();

        //В цикле while записываем результат в массив $result, пока (условие цикла)$row = mysqli_fetch_assoc($response)
        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        //Делаем все необходимые операции

        //Подсчитываем кол-во id в массиве
        $result = count($result);
        //Полученный результат делим на 5 и округляем до большего целого
        $result = ceil($result/5);
        //Вырезаем из полученного результата .0
        $result = explode(.0,$result);

        //и возвращаем массив с ключом 0
        return $result[0];
    }
}