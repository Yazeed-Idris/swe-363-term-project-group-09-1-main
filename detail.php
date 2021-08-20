<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail page</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&family=Roboto&display=swap"
          rel="stylesheet">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navigation section-->
    <?php
    include_once 'include/inc.header.php';
    ?>

    <!-- End navigation section-->

    <?php

    require_once("php/meal_db.php");       // Importing the class
    $meals = new Meal_db();                // Creating new instance of meals class
    $id = $_GET["id"];                  // Getting the query parameter
    $meal = $meals->getMealById($id);   // Getting the meal information by id

    ?>

    <div class="details" style="padding-left:2rem; padding-right:1.5rem">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <img alt=sandwich class="rounded-corners" src="projectImages/<?php echo $meal["image"] ?>">
                </div>
                <div class="col-md-12 col-lg-6">
                    <h1><?php echo $meal["title"] ?></h1>
                    <p><?php echo sprintf("%.2f", $meal["price"]) ?> SAR</p>

                    <?php
                    $sum = 0;
                    $counter = 0;
                    $reviews = $meals->getMealReviews();


                    foreach ($reviews as $review) {
                        if ($review["meal_id"] == $meal["id"]) {
                            $sum += $review["rating"];
                            $counter++;
                        }
                    }
                    $rating = 0;
                    if ($counter != 0) {
                        $rating = $sum / $counter;
                    }
                    ?>

                    <p>⭐<?php echo sprintf("%.2f", $rating) ?> rating</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias
                        dolore hic quaerat deserunt eum iusto architecto, officia impedit consequuntur earum voluptatum
                        totam quo minima molestiae velit nesciunt voluptas praesentium est. Nam nesciunt ex earum
                        inventore corrupti consequuntur molestias accusamus eaque, dignissimos exercitationem explicabo
                        expedita adipisci dolor nisi! Blanditiis omnis, nobis earum non architecto sapiente tempora
                        asperiores minus, hic, deleniti enim!</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-7 buttons-min-width">
                                <button class="quantity-button" onclick="decreaseQuantity()">-</button>
                                <button class="quantity-button" id="cartQuantityBtn">1</button>
                                <button class="quantity-button" onclick="increaseQuantity()">+</button>
                            </div>
                            <div class="col-5">
                                <a id="count"
                                   href="php/cart.php?<?php echo sprintf("id=%s&back=%s?id=%s&count=1", $id, urlencode("../detail.php"), $id); ?>">
                                    <button class="inline-block yellow-button"
                                            style="color:#a70e0f; border-left:1.5rem">Add to cart
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 1rem; margin-bottom: 1rem">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="active description" data-toggle="tab" href="#detailsPane"
                                        onclick="highlightDescription()" id="description">Description</a></li>
                <li class="nav-item"><a class="description" data-toggle="tab" href="#reviewsPane"
                                        onclick="showReviews()" id="reviews"
                                        style="background-color: white;">Reviews</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="detailsPane" role="tabpanel">

                <!-- Details section-->
                <p><?php echo $meal["description"] ?></p>
                <h4>Nutrition facts</h4>

                <?php
                $nutritionInfo = $meal["nutrition"];   // Getting nutrition array
                ?>

                <table class="details-table">
                    <tr>
                        <td colspan="3"><b>Supplement Facts</b></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Serving Size: </b><?php echo $nutritionInfo["serving_size"] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Serving Per
                                Container: </b><?php echo $nutritionInfo["serving_per_container"] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><b>Amount Per Serving</b></td>
                        <td><b>%Daily Value*</b></td>
                    </tr>
                    <?php
                    $facts = $nutritionInfo["facts"];       // Getting the facts for the table
                    ?>
                    <?php for ($i = 0; $i < count($facts); $i++): ?>
                        <tr>
                            <td><?php echo $facts[$i]["item"]; ?></td>
                            <td><?php echo $facts[$i]["amount_per_serving"] . " " . $facts[$i]["unit"]; ?></td>
                            <td><?php echo $facts[$i]["daily_value"]; ?></td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td colspan="3">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may
                            be
                            higher or lower depending on your calorie needs
                        </td>
                    </tr>
                </table>
            </div>
            <!-- End details section-->

            <div class="tab-pane" id="reviewsPane" role="tabpanel">
                <!-- Reviews section-->
                <div id="allReviews">
                    <div id="reviewsArea">
                        <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" id="indicator">
                            </ol>
                            <div class="carousel-inner" id="reviewsCarousel">

                            </div>
                            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div id="newReviews">
                        <button class="review-button yellow-button" onclick="displayReview()">Add Your Review</button>
                        <div id="reviewBox">
                            <form id="reviewForm" method="post" enctype="multipart/form-data" action="php/review.php">
                                <label class="roboto-black" for="imagePicker">Image</label>
                                <br><input class="input-field" id="imagePicker" type="file" name="file" required>
                                <br><label class="roboto-black" for="ratingSlider">Rate the Food</label>
                                <br><input id="ratingSlider" list="rateSettings" max="5" min="0" step="1" type="range"
                                           value="3" name="ratingSlider">
                                <datalist id="rateSettings">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </datalist>
                                <div class="roboto-black " name="fullName">Name</div>
                                <!--suppress HtmlFormInputWithoutLabel -->
                                <input class="input-field text-field" id="reviewerName"
                                       placeholder="First and Last name " type="text">
                                <div class="roboto-black ">City</div>
                                <!--suppress HtmlFormInputWithoutLabel -->
                                <input class="input-field text-field" id="city" placeholder="City" type="text"
                                       name="city">
                                <div class="roboto-black ">Review</div>
                                <div hidden id="roboto-red">Please type your review</div>
                                <!--suppress HtmlFormInputWithoutLabel -->
                                <textarea class="input-field text-field large-text-field"
                                          id="textareaReview" maxlength="500" oninput="count()"
                                          placeholder="Type your review here max 500 characters "
                                          name="textArea"></textarea>
                                <div class="roboto-black" id="characterCounter">0 / 500</div>
                            </form>
                            <br>
                            <button class="submit-button yellow-button" onclick="checkIfEmpty()">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- End reviews section-->
            </div>
        </div>
    </div>


    <!-- Contact section-->
    <?php
    include_once 'include/inc.footer.php';
    ?>
    <!-- End contact section-->
    <script src="js/app.js"></script>
</body>

</html>