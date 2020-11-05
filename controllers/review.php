<?php
    include "../models/model.php";
    include "../config/config.php";

    if(isset($_POST['submit'])){
        $name = strip_tags($_POST['user_name']);
        $review = strip_tags($_POST['review_text']);
        addReview($link, "review_table", $name, $review);
    }
    $getAll = getAll($link, "review_table");