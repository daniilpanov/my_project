<?php
namespace classes;
class CReviews extends MReviews
{
    public function getOneReview($id)
    {
        $review = $this->getReview($id);
        return $review;
    }
}