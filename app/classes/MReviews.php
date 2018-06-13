<?php
namespace app\classes;


class MReviews
{
    protected function getReviews($page, $start_id, $limit)
    {
        $sql = "SELECT `name`, `review`, `author`, `email`, `created`, `updated` FROM reviews WHERE visible = '1' AND page_id = '{$page}' LIMIT {$start_id}, {$limit}";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function getReviewsPerPage()
    {
        $sql = "SELECT `value` FROM constants WHERE name = 'reviews_per_page'";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    protected function countAllReviews()
    {
        $sql = "SELECT COUNT(`id`) FROM reviews";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}