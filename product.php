<?php include "html/header.php"; 
$id = $_GET['id'];
$stmt = $conn -> prepare("SELECT * FROM Products WHERE ProductsID = ?");
$stmt -> bind_param("i", $id);
$stmt -> execute();
$stmt = $stmt -> get_result();
$Product = $stmt -> fetch_assoc();
?>


<form action="basket.php" method="post">
	<div id="product" class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="img/<?php echo htmlspecialchars($Product['img']);?>" class="w-100">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            <?php echo htmlspecialchars($Product['Category']).' '.htmlspecialchars($Product['ProductName']);?>
                        </h4>
                        <hr>
                        <div>
                            <span class="selling-price"><?php echo htmlspecialchars($Product['Price']);?> ₽</span>
                        </div>
						<input type="hidden" name="id_product" value='<?php echo $Product['ProductsID']; ?>'>
						<button type="submit" class="mt-2" class="btn btn1">
                         <i class="fa fa-shopping-cart"></i> Заказать
						</button>

                        <div class="mt-3">
                            <h5 class="mb-0">Краткая информация</h5>
                            <p>
                                <?php echo htmlspecialchars($Product['ShortDescription']);?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Информация стрижке</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php echo htmlspecialchars($Product['FullDescription']);?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include "html/footer.php"; ?>