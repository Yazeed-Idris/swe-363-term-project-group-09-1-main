<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index page</title>
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

    <!-- Navigation and Welcome section-->

    <!-- Top navigation    -->
    <?php
    include_once 'include/inc.header.php';
    ?>

    <!-- Welcome section    -->
    <div class="aligned10 nav-background">
        <div class="container-fluid">
            <h1 class="title">Party Time</h1>
            <div class="row">
                <div class="ribbon-shape" style="min-width:330px">
                    <div class="col-xs-4 col-centered"><h3>Buy any 2 burgers and get 1.5L Pepsi free</h3></div>
                </div>
            </div>
            <form>
                <button class="order-now yellow-button">Order Now</button>
            </form>
        </div>
    </div>
    <!-- End navigation and welcome section-->

    <?php
    require_once("php/meal_db.php");
    $meals = new Meal_db();
    $mealsArray = $meals->getAllMeals();
    ?>

    <!-- Recently Ordered -->
    <?php if (isset($_COOKIE["recently_bought"])) :
        $removed_duplicates = explode(",", $_COOKIE["recently_bought"]);
        array_pop($removed_duplicates);
        $removed_duplicates = array_unique($removed_duplicates);
        ?>

        <div class="container-fluid" id="recentlyBought" style="padding-top: 2rem;">
            <h2>Your Recent Bought Products</h2>
            <div class="row">
                <?php foreach ($removed_duplicates as $mealID): ?>
                    <?php $meal = $meals->getMealById($mealID); ?>
                    <div href="detail.php" class="col-xs-12 col-md-4 col-lg-3 card">
                        <a href="detail.php?id=<?php echo $meal["id"] ?>">
                            <img alt="sandwich" src="projectImages/<?php echo $meal["image"] ?>">
                            <div class="container">
                                <nav>

                                    <?php
                                    $sum = 0;
                                    $counter = 0;
                                    $reviews = $meals->getMealReviews();


                                    foreach ($reviews as $review) {
                                        if ($review["meal_id"] == $mealID) {
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
                                    <p><b><?php echo $meal["title"] ?></b></p>
                                    <p>Some description</p>
                                    <div>
                                        <a href="php/cart.php?<?php echo sprintf("id=%s&back=%s", $meal["id"], urlencode("../index.php#recentlyBought")); ?>"
                                           class="yellow-button-a">
                                            <button class="inline-block yellow-button">
                                                Buy again
                                            </button>
                                        </a>
                                        <p class="inline-block"><?php echo sprintf("%.2f", $meal["price"]); ?> SAR
                                        </p>
                                    </div>
                                </nav>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <!--  End of Recently Ordered-->

    <!-- Menu section-->
    <div class="menu" id="menu">
        <h2>Want To Eat</h2>
        <p class="paragraph1">Try our most delicious food and usually take minutes to deliver</p>
        <div class="container-fluid">
            <nav>
                <div class="row">
                    <div class="col-sm-2 food-links"><a href="#">Pizza</a></div>
                    <div class="col-sm-2 food-links"><a href="#">Fast Food</a></div>
                    <div class="col-sm-2 food-links"><a href="#">Cupcake</a></div>
                    <div class="col-sm-2 food-links"><a href="#">Sandwich</a></div>
                    <div class="col-sm-2 food-links"><a href="#">Spaghetti</a></div>
                    <div class="col-sm-2 food-links"><a href="#">Burger</a></div>
                </div>
            </nav>
        </div>
    </div>
    <div class="menu-background container-fluid">
        <div class="row">
            <div class="col-lg-6"><img alt="delivery guy" class="full-image" src="projectImages/delivery.png"></div>
            <div class="col-lg-6" style="display:flex;align-items:center;">
                <div class="triangle-container" style="margin-bottom: 40px;">
                    <div class="triangle" id="triangle">
                        <h2>We guarantee 30 minutes delivery</h2>
                    </div>
                    <p class="montserrat white-text" style="font-size: 16px;">If your are having a meeting, working late
                        at night and need an extra push</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End menu section-->

    <!-- Gallery section-->
    <div class="container-fluid" id="gallery">
        <h2>Our Most Popular Recipes</h2>
        <p class="paragraph1">Try our most delicious food and usually take minutes to deliver</p>
        <div class="row">
            <?php foreach ($mealsArray as $meal): ?>
                <div href="detail.php" class="col-xs-12 col-md-4 col-lg-3 card">
                    <a href="detail.php?id=<?php echo $meal["id"] ?>">
                        <img alt="sandwich" src="projectImages/<?php echo $meal["image"] ?>">
                        <div class="container">
                            <nav>
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
                                <p><b><?php echo $meal["title"] ?></b></p>
                                <p>Some description</p>
                                <div>
                                    <a href="php/cart.php?<?php echo sprintf("id=%s&back=%s", $meal["id"], urlencode("../index.php#gallery")); ?>"
                                       class="yellow-button-a">
                                        <button class="inline-block yellow-button">
                                            add to cart
                                        </button>
                                    </a>
                                    <p class="inline-block">
                                        <?php echo sprintf("%.2f", $meal["price"]); ?> SAR
                                    </p>
                                </div>
                            </nav>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- End Gallery section-->

    <!-- Testimonials section-->
    <div class="container-fluid align-responsive" style="" id="testimonials">
        <h2>Clients Testimonials</h2>


        <div class="row">
            <div class="col-lg-6">
                <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="projectImages/man-eating-burger.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="projectImages/man-eating-burger.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="projectImages/man-eating-burger.png" alt="Third slide">
                        </div>
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
            <div class="col-lg-6" style="position:sticky">
                <p class="paragraph3 fixed-width1000">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
                    ullam deserunt laborum, laboriosam veritatis quibusdam blanditiis dolor exercitationem velit commodi
                    quae assumenda incidunt voluptas. Corporis ex nulla repellendus ullam nihi
                </p>
            </div>
        </div>
    </div>
    <!-- End testimonials section-->

    <!-- Contact section-->
    <?php
    include_once 'include/inc.footer.php';
    ?>
    <!-- End contact section-->
    <script src="js/app.js"></script>
</body>

</html>