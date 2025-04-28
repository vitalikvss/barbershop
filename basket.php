<?php

    session_start();

    include 'config.php';

    $ProductsID = $_POST['id_product'];

    $stnt = $conn->prepare("SELECT * FROM Products WHERE ProductsID = ?");
    $stnt-> bind_param("i", $ProductsID);
    $stnt-> execute();
    $stnt = $stnt-> get_result();
    
    $product = $stnt-> fetch_assoc();

    if ($product){
        $found = false;
        foreach ($_SESSION['basket'] as &$item){
            if ($item['ProductsID'] == $product['ProductsID']){
                $item['count'] ++;
                $found = true;
                break;
            }
        }
        if (!$found){
            $_SESSION['basket'][] = [
                'ProductsID'=> $product['ProductsID'],
                'ProductName'=> $product['ProductName'],
            	'ShortDescription'=> $product['ShortDescription'],
                'Price'=>$product['Price'],
                'img'=>$product['img'],
                'count'=> 1
            ];
        }
    }
    header('Location:cart.php');
    exit();
?>