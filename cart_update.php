<?php
session_start();
require("connect.php");



if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }

    unset($new_product['type']);
    unset($new_product['return_url']);

    $stmt = $pdo->prepare("SELECT product_name, price FROM products WHERE product_code=:product_code LIMIT 1");
    $stmt->bindParam(':product_code', $new_product['product_code']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $new_product["product_name"] = $result['product_name'];
    $new_product["product_price"] = $result['price'];

    if(isset($_SESSION["cart_products"])){
        if(isset($_SESSION["cart_products"][$new_product['product_code']]))
        {
            unset($_SESSION["cart_products"][$new_product['product_code']]);
        }
    }
    $_SESSION["cart_products"][$new_product['product_code']] = $new_product;
}

if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
    if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
        foreach($_POST["product_qty"] as $key => $value){
            if(is_numeric($value)){
                $_SESSION["cart_products"][$key]["product_qty"] = $value;
            }
        }
    }

    if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
        foreach($_POST["remove_code"] as $key){
            unset($_SESSION["cart_products"][$key]);
        }
    }
}

$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):'';
header('Location:'.$return_url);

?>
