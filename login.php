<?php include "html/header.php";?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $errors = [];

    $stmt = $conn->prepare("SELECT UsersID, Password, Role FROM Users WHERE Email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($UsersID, $hashed_password, $Role);
        $stmt->fetch();
        if (password_verify($Password, $hashed_password)) {
            $_SESSION['UsersID'] = $UsersID;
            $_SESSION['Role'] = $Role;
           	$_SESSION['Email'] = $Email;
            header("Location: index.php");
        } else {
            $errors[] = "Неправильный пароль.";
        }
    } else {
        $errors[] = "Пользователь не найден.";
    }
    $stmt->close();
}
?>

    <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Вход</p>
                <?php
                  if (!empty($errors)) {
                    echo '<div class="alert alert-danger">';
                    foreach ($errors as $e) {
                      echo "<p class='mb-0'>" . htmlspecialchars($e) . "</p>";
                    }
                    echo '</div>';
                  }
                ?>
                <form action="login.php" method="post" class="mx-1 mx-md-4" novalidate>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="Email" name="Email" id="form3Example3c" class="form-control" required>
                      <label class="form-label" for="form3Example3c">Ваш Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                      <input type="Password" name="Password" id="form3Example4c" class="form-control" required>
                      <label class="form-label" for="form3Example4c">Пароль</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Вход</button>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <p class="mb-0">У вас нет учетной записи? <a href="registration.php" class="fw-bold">Зарегистрируйтесь</a>
                    </p>
                 </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="img/login.png" class="img-fluid">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <?php include "html/footer.php"; ?>