<!-- Top navigation    -->
<div class="top-nav-container">
    <nav class="navbar navbar-expand-xl navbar-dark top-nav" style="padding-right: 10rem; padding-left: 10rem">
        <img alt="burger" class="navbar-brand white-logo" src="projectImages/logo-White.svg" width="100">

        <button class="navbar-toggler" data-target="#collapsibleNavbar" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse left-margin" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#testimonials">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contactUs">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active-a" href="#">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active-a" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active-a" data-target="#cartContent" data-toggle="modal" href="#">Cart <span
                                class="cart-quantity" id="cartQuantity"><?php
                            require_once("php/meal_db.php");
                            $meals = new Meal_db();
                            $mealsArray = $meals->getAllMeals();
                            if (isset($_COOKIE["cart"])) {
                                $cookieStr = $_COOKIE["cart"];
                                echo ((strlen($cookieStr) - 1) / 2) + 1;
                            } else {
                                echo "0";
                            }
                            ?></span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="cartContent" role="dialog"
     tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartContentLabel">Cart Content</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="container" id="cartContentTable">
                    <div class="row">
                        <div class="col-sm">
                            Item
                        </div>
                        <div class="col-sm">
                            Price
                        </div>
                    </div>

                    <?php

                    require_once("php/meal_db.php");

                    $meals = new Meal_db();

                    $total = 0;

                    if (isset($_COOKIE["cart"])) :

                        $cookieStr = $_COOKIE["cart"];

                        $ids = explode(",", $cookieStr);

                        foreach ($ids as $id):
                            $meal = $meals->getMealById($id);
                            ?>
                            <div class="row">
                                <div class="col-sm">
                                    <?php echo $meal["title"] ?>
                                </div>
                                <div class="col-sm">
                                    <?php echo sprintf("%.2f", $meal["price"]) ?>
                                </div>
                            </div>

                            <?php
                            $total += $meal["price"];
                        endforeach;
                    endif;
                    ?>

                    <div class="row">
                        <div class="col-sm">
                            Total
                        </div>
                        <div class="col-sm" id="totalPrice">
                            <?php echo sprintf("%.2f", $total) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="close-btn" data-dismiss="modal" type="button">Close</button>

                <!-- Hidden "Order Now" form -->
                <form action="php/order.php" id="checkout_form" method="POST">

                    <button class="button yellow-button" value="Order Now">Order Now</button>

                    <?php if (isset($_COOKIE['cart'])):
                        foreach (explode(",", $_COOKIE['cart']) as $order_id) : ?>
                            <input type="hidden" name="order_ids[]" value="<?php echo $order_id ?>">
                        <?php endforeach;
                    endif ?>
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                </form>
                <!--  End of Hidden "Order Now" form -->

            </div>
        </div>
    </div>
</div>