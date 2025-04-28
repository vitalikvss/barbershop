<?php include "html/header.php"; ?>
<section id="cart" class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
  <h4 class="text-center mt-4 mb-5"><strong>Ваш заказ на стрижку</strong></h4>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-12">
				<div class="d-flex justify-content-between">
                <h5 class="mb-3"><a href="index.php" class="text-body">На главную</a></h5>
				</div>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Ваша стрижка</p>
                  </div>
                </div>
                <?php
              
                $book_stmt = $conn->prepare("SELECT date, phone FROM booked_dates WHERE UserID = ?");
                $book_stmt->bind_param("i", $_SESSION['UsersID']);
                $book_stmt->execute();
                $book_result = $book_stmt->get_result();
                $booking = $book_result->fetch_assoc();
                $book_stmt->close();

                $stmt = $conn->prepare("SELECT * FROM Orders WHERE UsersID = ?");
                $stmt -> bind_param("i", $_SESSION['UsersID']);
                $stmt -> execute();
                $result = $stmt->get_result();
                
                if($result -> num_rows > 0)
                {
                  $orders = $result ->fetch_all(MYSQLI_ASSOC);
                  foreach($orders as $order) {
                  $det = $conn -> prepare("SELECT * FROM Products WHERE ProductsID = ?");
                  $det -> bind_param("i", $order['ProductsID']);
                  $det -> execute();
                  $det = $det -> get_result();
                  $details = $det -> fetch_assoc();
                ?>
                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="img/<?php echo htmlspecialchars($details['img']);?>"
                            class="img-fluid rounded-3" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?php echo htmlspecialchars($details['ProductName']); ?></h5>
                          <p class="small mb-0"><?php echo htmlspecialchars($details['ShortDescription']); ?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">

                        <div style="padding-left:10px;">
                          <h5 class="mb-0"><?php echo htmlspecialchars($booking['date']); ?></h5>
                        </div>
                        <div style="padding-left:10px;">
                          <h5 class="mb-0"><?php echo htmlspecialchars($booking['phone']); ?></h5>
                        </div>
                        <div style="padding-left:10px;">
                          <h5 class="mb-0"><?php echo htmlspecialchars($details['Price']); ?> ₽</h5>
                        </div>

                        <a href="deleteOrders.php?id=<?php echo htmlspecialchars($order['OrdersID']);?>" style="color: #cecece;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-cart-x-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM7.354 5.646 8.5 6.793l1.146-1.147a.5.5 0 0 1 .708.708L9.207 7.5l1.147 1.146a.5.5 0 0 1-.708.708L8.5 8.207 7.354 9.354a.5.5 0 1 1-.708-.708L7.793 7.5 6.646 6.354a.5.5 0 1 1 .708-.708z"/>
</svg></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php }}?>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include "html/footer.php"; ?>