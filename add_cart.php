<?php
session_start();

//checking whether product already in the cart
if(!in_array($_GET['id'], $_SESSION['cart']))
{
    array_push($_SESSION['cart'], $_GET['id']);
    $_SESSION['message'] = 'Product added to cart';
    header('location: products.php');
}
else
{
    $_SESSION['message'] = 'Product already in the cart';
    header('location: products.php');
}
