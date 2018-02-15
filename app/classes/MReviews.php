<?php
namespace app\classes;

class MReviews
{
    protected function getReview($id)
    {
        $sql = "SELECT * FROM reviews WHERE id={$id}";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}