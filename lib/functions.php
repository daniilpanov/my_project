<?php
function today()
{
    $month['January'] = 'января';
    $month['February'] = 'февраля';
    $month['March'] = 'марта';
    $month['April'] = 'апреля';
    $month['May'] = 'мая';
    $month['June'] = 'июня';
    $month['July'] = 'июля';
    $month['August'] = 'августа';
    $month['September'] = 'сентября';
    $month['October'] = 'октября';
    $month['November'] = 'ноября';
    $month['December'] = 'декабря';

    $days['Sunday'] = 'воскресенье';
    $days['Monday'] = 'понедельник';
    $days['Tuesday'] = 'вторник';
    $days['Wednesday'] = 'среда';
    $days['Thursday'] = 'четверг';
    $days['Friday'] = 'пятница';
    $days['Saturday'] = 'суббота';

    echo 'Сегодня '.date('j').' '.$month[date('F')].' '.date('o').' года, '.$days[date('l')];
}