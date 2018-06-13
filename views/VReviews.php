<?php
if (!isset($_GET['page']) OR !isset($_GET['review']))
{
    $page = $_GET['page'];
    $start_review = $_GET['review'];
}
$all_reviews = $reviews->getReviewsFromDb($page, $start_review);