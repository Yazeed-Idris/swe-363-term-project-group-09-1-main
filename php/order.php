<?php

if (isset($_POST["order_ids"])) {
    setcookie("recently_bought", implode(",", $_POST["order_ids"]) . "," . $_POST['total'], time() + 302460 * 60, "/");
    unset($_COOKIE['cart']);
    setcookie("cart", null, -1, "/");
}

header("Location:../index.php");
