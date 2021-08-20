<?php

// Retrieving parameters
$id = $_GET["id"];              // id of the meal
$back = $_GET["back"];          // url of previous page
$count = $_GET["count"];        // how many meals the user added to the cart

// Create/add to the cookie
if (isset($_COOKIE["cart"])){
    $cookieStr = $_COOKIE["cart"];
    setcookie("cart", "", time() - 86400);
    setcookie("cart", $cookieStr. ",".$id, time()+30*24*60*60, "/");
} else {
    setcookie("cart", "", time() - 86400);
    setcookie("cart", $id, time()+30*24*60*60, "/");
}

// Redirecting to previous page
header("Location:" .$back);