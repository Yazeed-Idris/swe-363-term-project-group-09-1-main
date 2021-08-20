<?php


class Meal_db
{
    private $connection;
    private $host = "localhost";
    private $database = "meals_db";
    private $username = "root";
    private $password = "";

    private $arr = array(
        array(
            "id" => 1,
            "nutrition" => array(
                "serving_size" => "1 sandwich (57 g)",
                "serving_per_container" => 1,
                "facts" => array(
                    array("item" => "calories",
                        "amount_per_serving" => 200,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "calories_from_fat",
                        "amount_per_serving" => 70,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "total_fat",
                        "amount_per_serving" => 7,
                        "daily_value" => "11%",
                        "unit" => "g",
                    ),
                    array("item" => "saturated_fat",
                        "amount_per_serving" => 4,
                        "daily_value" => "20%",
                        "unit" => "g",
                    ),
                    array("item" => "cholestrol",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "sodium",
                        "amount_per_serving" => 220,
                        "daily_value" => "9%",
                        "unit" => "mg",
                    ),
                    array("item" => "total_carb",
                        "amount_per_serving" => 31,
                        "daily_value" => "10%",
                        "unit" => "g",
                    ),
                    array("item" => "vitamin_A",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "calcium",
                        "amount_per_serving" => 0,
                        "daily_value" => "2%",
                        "unit" => "mg",
                    ),
                )
            ),

        ),
        array(
            "id" => 2,
            "nutrition" => array(
                "serving_size" => "1 sandwich (357 g)",
                "serving_per_container" => 1,
                "facts" => array(
                    array("item" => "calories",
                        "amount_per_serving" => 200,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "calories_from_fat",
                        "amount_per_serving" => 70,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "total_fat",
                        "amount_per_serving" => 7,
                        "daily_value" => "11%",
                        "unit" => "g",
                    ),
                    array("item" => "saturated_fat",
                        "amount_per_serving" => 4,
                        "daily_value" => "20%",
                        "unit" => "g",
                    ),
                    array("item" => "cholestrol",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "sodium",
                        "amount_per_serving" => 220,
                        "daily_value" => "9%",
                        "unit" => "mg",
                    ),
                    array("item" => "total_carb",
                        "amount_per_serving" => 31,
                        "daily_value" => "10%",
                        "unit" => "g",
                    ),
                    array("item" => "vitamin_A",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "calcium",
                        "amount_per_serving" => 0,
                        "daily_value" => "2%",
                        "unit" => "mg",
                    ),
                )
            ),

        ),
        array(
            "id" => 3,
            "nutrition" => array(
                "serving_size" => "1 Sandwich (257 g)",
                "serving_per_container" => 3,
                "facts" => array(
                    array("item" => "calories",
                        "amount_per_serving" => 200,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "calories_from_fat",
                        "amount_per_serving" => 70,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "total_fat",
                        "amount_per_serving" => 7,
                        "daily_value" => "11%",
                        "unit" => "g",
                    ),
                    array("item" => "saturated_fat",
                        "amount_per_serving" => 4,
                        "daily_value" => "20%",
                        "unit" => "g",
                    ),
                    array("item" => "cholestrol",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "sodium",
                        "amount_per_serving" => 220,
                        "daily_value" => "9%",
                        "unit" => "mg",
                    ),
                    array("item" => "total_carb",
                        "amount_per_serving" => 31,
                        "daily_value" => "10%",
                        "unit" => "g",
                    ),
                    array("item" => "vitamin_A",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "calcium",
                        "amount_per_serving" => 0,
                        "daily_value" => "2%",
                        "unit" => "mg",
                    ),
                )

            ),

        ),
        array(
            "id" => 4,
            "nutrition" => array(
                "serving_size" => "1 dish (200 g)",
                "serving_per_container" => 4,
                "facts" => array(
                    array("item" => "calories",
                        "amount_per_serving" => 200,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "calories_from_fat",
                        "amount_per_serving" => 70,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "total_fat",
                        "amount_per_serving" => 7,
                        "daily_value" => "11%",
                        "unit" => "g",
                    ),
                    array("item" => "saturated_fat",
                        "amount_per_serving" => 4,
                        "daily_value" => "20%",
                        "unit" => "g",
                    ),
                    array("item" => "cholestrol",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "sodium",
                        "amount_per_serving" => 220,
                        "daily_value" => "9%",
                        "unit" => "mg",
                    ),
                    array("item" => "total_carb",
                        "amount_per_serving" => 31,
                        "daily_value" => "10%",
                        "unit" => "g",
                    ),
                    array("item" => "vitamin_A",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "calcium",
                        "amount_per_serving" => 0,
                        "daily_value" => "2%",
                        "unit" => "mg",
                    ),
                )

            ),

        ),
        array(
            "id" => 5,
            "nutrition" => array(
                "serving_size" => "1 sandwich (257 g)",
                "serving_per_container" => 1,
                "facts" => array(
                    array("item" => "calories",
                        "amount_per_serving" => 200,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "calories_from_fat",
                        "amount_per_serving" => 70,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "total_fat",
                        "amount_per_serving" => 7,
                        "daily_value" => "11%",
                        "unit" => "g",
                    ),
                    array("item" => "saturated_fat",
                        "amount_per_serving" => 4,
                        "daily_value" => "20%",
                        "unit" => "g",
                    ),
                    array("item" => "cholestrol",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "sodium",
                        "amount_per_serving" => 220,
                        "daily_value" => "9%",
                        "unit" => "mg",
                    ),
                    array("item" => "total_carb",
                        "amount_per_serving" => 31,
                        "daily_value" => "10%",
                        "unit" => "g",
                    ),
                    array("item" => "vitamin_A",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "calcium",
                        "amount_per_serving" => 0,
                        "daily_value" => "2%",
                        "unit" => "mg",
                    ),
                )

            ),

        ),
        array(
            "id" => 6,
            "nutrition" => array(
                "serving_size" => "1 slice (50 g)",
                "serving_per_container" => 12,
                "facts" => array(
                    array("item" => "calories",
                        "amount_per_serving" => 200,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "calories_from_fat",
                        "amount_per_serving" => 70,
                        "daily_value" => "",
                        "unit" => "cal",
                    ),
                    array("item" => "total_fat",
                        "amount_per_serving" => 7,
                        "daily_value" => "11%",
                        "unit" => "g",
                    ),
                    array("item" => "saturated_fat",
                        "amount_per_serving" => 4,
                        "daily_value" => "20%",
                        "unit" => "g",
                    ),
                    array("item" => "cholestrol",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "sodium",
                        "amount_per_serving" => 220,
                        "daily_value" => "9%",
                        "unit" => "mg",
                    ),
                    array("item" => "total_carb",
                        "amount_per_serving" => 31,
                        "daily_value" => "10%",
                        "unit" => "g",
                    ),
                    array("item" => "vitamin_A",
                        "amount_per_serving" => 0,
                        "daily_value" => "0%",
                        "unit" => "mg",
                    ),
                    array("item" => "calcium",
                        "amount_per_serving" => 0,
                        "daily_value" => "2%",
                        "unit" => "mg",
                    ),
                )

            ),

        ),
    );

    function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    function getAllMeals()
    {
        $mealsArr = array();
        $query = 'SELECT * FROM meal';
        if ($result = mysqli_query($this->connection, $query)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {

                    foreach ($this->arr as $facts) {
                        if ($facts["id"] = $row["id"]) {
                            $row["nutrition"] = $facts["nutrition"];
                        }
                    }
                    array_push($mealsArr, $row);
                }
            }
        }
        return $mealsArr;
    }

    function getMealById($id)
    {
        $row = null;
        $query = "SELECT * FROM meal WHERE id=$id";
        if ($result = mysqli_query($this->connection, $query)) {
            if (mysqli_num_rows($result) > 0) {
                if ($row = mysqli_fetch_array($result)) {
                    foreach ($this->arr as $facts) {
                        if ($facts["id"] = $row["id"]) {
                            $row["nutrition"] = $facts["nutrition"];
                        }
                    }
                }
            }
        }
        return $row;
    }

    function getMealReviews()
    {
        $reviewsArr = array();
        $query = "SELECT * FROM reviews";
        if ($result = mysqli_query($this->connection, $query)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {

                    array_push($reviewsArr, $row);
                }
            }
        }
        return $reviewsArr;
    }

    function addMealReview($review)
    {
        $image = $review['image'];
        $name = mysqli_real_escape_string($this->connection, $review['name']);
        $city = mysqli_real_escape_string($this->connection, $review['city']);
        $rating = mysqli_real_escape_string($this->connection, $review['rating']);
        $rating = (int)$rating;
        $description = mysqli_real_escape_string($this->connection, $review['description']);
        $date = date('y-m-d h:i:s');
        $meal_id = $review['meal_id'];
        $query = "INSERT INTO reviews(id, reviewer_name, city, date, rating, image, review, meal_id) values('','$name', '$city', '$date', '$rating','$image', '$description', '$meal_id')";
        if (mysqli_query($this->connection, $query)) {
            echo "records inserted successfully";
            $this->connection->close();
        } else {
            echo "Error: " . mysqli_error($this->connection);
        }
    }

    function uploadFile($connection, $image)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}