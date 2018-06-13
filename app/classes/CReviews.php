<?php
namespace app\classes;


class CReviews extends MReviews
{
    public function getReviewsFromDb($page, $start_id)
    {
        $reviews_per_page = $this->countReviewsPerPage();

        $reviews = $this->getReviews($page, $start_id, $reviews_per_page);

        return $reviews;
    }

    public function countReviews()
    {
        $result = mysqli_fetch_row($this->countAllReviews());

        return $result;
    }

    private function countReviewsPerPage()
    {
        $response = $this->getReviewsPerPage();

        $result = mysqli_fetch_row($response);

        return $result;
    }
}