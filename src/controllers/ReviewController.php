<?php

require_once __DIR__ . '/../../src/Repositories/ReviewRepository.php';

class ReviewController{

    public function addReview() {

        if(isset($_GET['event'])){
            $id_event = $_GET['event'];
        }
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_studient = $_SESSION['id_studient'];
            $rating = "";
            $comment = $_POST['comment'];

            $newReview = new ReviewRepository();

            $newReview->createReview($id_event, $id_studient, $rating, $comment);
        }
    }
}