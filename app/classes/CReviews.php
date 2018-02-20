<?php
namespace app\classes;

class CReviews extends MReviews
{
    public function getOneReview($input)
    {
        foreach ($input as $value)
        {
            $content[] = $value;
        }
        $insert = $content[1].'<br>'.$content[2].'<br>'.$content[3].'<br>'.$content[4].'<br>'.$content[5].'<hr>';
        $review = $this->getReview($insert);
        return $review;
    }
}