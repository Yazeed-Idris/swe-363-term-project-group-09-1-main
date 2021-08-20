<?php
require_once("meal_db.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $meals = new Meal_db();
    $reviews = $meals->getMealReviews();
    if (isset($_GET)) {
        $mealID = $_GET["id"];
    }
    $reviewsArr = array();


    foreach ($reviews as $review) {
        if ($review["meal_id"] == $mealID) {
            array_push($reviewsArr, $review);
        }
    }

    $respond = json_encode($reviewsArr);
    echo $respond;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES["file"])){
        $fileName = $_FILES["file"]["name"];
        $fileTmp = $_FILES["file"]["tmp_name"];

        $newFolderName = "../reviewImages/";

        if (!file_exists($newFolderName)) {
            mkdir($newFolderName);
        }

        $moveFile = move_uploaded_file($fileTmp, $newFolderName.$fileName);

        if ($moveFile) {
            echo "file moved successfully";
        }

    }

    if (isset($_POST["name"])){
        $meals = new Meal_db();
        $name = $_POST["name"];
        $city = $_POST["city"];
        $rating = $_POST["rating"];
        $image = $_POST["image"];
        $reviewText = $_POST["reviewText"];
        $meal_id = $_POST["meal_id"];

        $meals->addMealReview(array(
            "image" => $image,
            "name" => $name,
            "city" => $city,
            "rating" => $rating,
            "description" => $reviewText,
            "meal_id" => $meal_id
        ));
    }





}




