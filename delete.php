<?php
session_start();

if(isset($_GET['id']))	{
	foreach($_SESSION['basket'] as $key => $row)	{
    	if($row['ProductsID'] == $_GET['id'])	{
        	unset($_SESSION['basket'][$key]);
        	break;
        }
    }
}
header('Location: cart.php');
exit();
?>