<?php include "html/header.php"; ?>


<section style="background-color: #eee;">
  <div class="text-center container py-5">
    
<?php
$Category = $_GET['Category'];
$stmt = $conn -> prepare("SELECT * FROM Products WHERE Category = ?");
echo '
	<h4 class="mt-4 mb-5"><strong>'.htmlspecialchars($Category).'</strong></h4>
	<div class="row">';
$stmt -> bind_param("s", $Category);
$stmt -> execute();
$Result = $stmt -> get_result();

if($Result -> num_rows > 0) {
	$Products = $Result -> fetch_all(MYSQLI_ASSOC);
	foreach($Products as $Product)	{
    echo '
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="card">
          <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="img/'.htmlspecialchars($Product['img']).'"
              class="w-100" />
          </div>
          <div class="card-body">
            <a href="product.php?id='.htmlspecialchars($Product['ProductsID']).'" class="text-reset">
              <h5 class="card-title mb-3">'.htmlspecialchars($Product['ProductName']).'</h5>
            </a>
            <a href="" class="text-reset">
              <p>'.htmlspecialchars($Product['Category']).'</p>
            </a>
            <h6 class="mb-3">'.htmlspecialchars($Product['Price']).' ₽</h6>
          </div>
        </div>
      </div>
      ';
}
}
?>
    </div>
  </div>
</section>


<?php include "html/footer.php"; ?>