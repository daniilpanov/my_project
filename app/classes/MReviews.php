<?php
namespace app\classes;

class MReviews
{
    protected function getReview($value)
    {
        $sql = "INSERT INTO pages(content) VALUE ({$value})";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}