<?php
require 'config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Yuna beauty style</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Yuna beauty style</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
          </li>
			<?php if(isset($_SESSION['UsersID']))	{
                echo'
                <li class="nav-item">
            	  	<a class="nav-link" href="cart.php">Корзина</a>
          	  	</li>';
                }
			?>

      <?php //if(isset($_SESSION['UsersID']))	{
//                echo'
//                <li class="nav-item">
//            	  	<a class="nav-link" href="date.php">Запись на прием(врем.ссылка)</a>
//          		  </li>';
//                }
//			?>
           
      <?php if(isset($_SESSION['UsersID']))	{
                echo'
                <li class="nav-item">
            	  	<a class="nav-link" href="gallery.php">Галерея</a>
          	  	</li>';
                }
			?>     

			<?php //if(isset($_SESSION['UsersID']))	{
//                echo'
//      	      <li class="nav-item">
//          		  <a class="nav-link" href="product.php">Товар(врем.ссылка)</a>
//        	    </li>';
//                }
			?>

			<?php if(isset($_SESSION['UsersID']))	{
                echo'
       	      <li class="nav-item">
        		    <a class="nav-link" href="orders.php">Заказы</a>
           	  </li>';
                }
			?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Стрижки
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="catalog.php?Category=Мужская">Мужские</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="catalog.php?Category=Женская">Женские</a></li>
            </ul>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Аккаунт
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
				<?php if(!isset($_SESSION['UsersID']))	{
                echo'
              <li><a class="dropdown-item" href="login.php">Вход</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="registration.php">Регистрация</a></li>';
                }
				      if(isset($_SESSION['UsersID']))	{
                echo '<li><a class="dropdown-item" href="logout.php">Выход</a></li>';
                }
				?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>