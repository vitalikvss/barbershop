<?php include "html/header.php";
?>

<section id="cart1" class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
  <h4 class="text-center mt-4 mb-5"><strong>Ваша корзина</strong></h4>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>На главную</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Ваша стрижка</p>
                  </div>

                </div>
                    <?php
						$result_price = 0;
                    	if (isset ($_SESSION['basket']) && count($_SESSION['basket']) > 0){
                    	foreach($_SESSION['basket'] as $item){
                        $result_price = $item['Price'];

                        if (count($_SESSION['basket']) > 0) {
                          foreach ($_SESSION['basket'] as $key => $row) {
                              unset($_SESSION['basket'][$key]);
                              break;
                           }
                        }
                    ?>
                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img src="img/<?php echo htmlspecialchars($item['img']);?>"
                            class="img-fluid rounded-3" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?php echo htmlspecialchars($item['ProductName']);?></h5>
                          <p class="small mb-0"><?php echo htmlspecialchars($item['ShortDescription']);?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 80px;">
                          <h5 class="mb-0"><?php echo htmlspecialchars($item['Price']);?> ₽</h5>
                        </div>
                        <a href="delete.php?id=<?php echo htmlspecialchars($item['ProductsID']);?>" style="color: #cecece;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-cart-x-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7.354 5.646 8.5 6.793l1.146-1.147a.5.5 0 0 1 .708.708L9.207 7.5l1.147 1.146a.5.5 0 0 1-.708.708L8.5 8.207 7.354 9.354a.5.5 0 1 1-.708-.708L7.793 7.5 6.646 6.354a.5.5 0 1 1 .708-.708z"/>
</svg></a>
                      </div>
                    </div>
                  </div>
                </div>
                    <?php }} ?>
              </div>
              
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">

                    <form class="mt-4">
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Имя владельца" />
                        <label class="form-label" for="typeName">Имя владельца</label>
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeNumber" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeNumber">Номер карты</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MM/YY" size="5" id="exp" minlength="5" maxlength="5" />
                            <label class="form-label" for="typeExp">Срок действия</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">CVV</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Сумма</p>
                      <p class="mb-2"><?php echo htmlspecialchars($result_price);?> ₽</p>
                    </div>
					<form action="date.php">
                    <button type="submit" href="date.php" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        <span>Купить</span>
                      </div>
                    </button>
					</form>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include "html/footer.php"; ?>