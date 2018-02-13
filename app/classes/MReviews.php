<?php
namespace app\classes;
class MReviews
{
    protected function getReview($id)
    {
        $sql = "SELECT * FROM reviews WHERE id={$id}";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }
}