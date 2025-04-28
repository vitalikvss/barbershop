<?php include "html/header.php"; ?>

<header>
    <img src="img/header.png" class="img-fluid">
</header>
<br>
<main id="main">
    <div class="d-grid col-4 mx-auto">
      <button class="btn btn-lg btn-success" type="button" id="bookOnlineBtn">Записаться онлайн</button>
    </div>
    <br>
    <h2>Стрижка — это искусство. Доверьтесь профессионалам!</h2>
    <br>
    <h3>Примеры нашей работы</h3>
    <br>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/one.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/two.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/three.jpg" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
    </div>

<div class="cardDiv">
<div class="card" style="width: 18rem;">
  <img src="img/cardimg.png" class="card-img-top">
  <div class="card-body">
    <p class="card-text">Описание работника</p>
  </div>
</div>
</div>


</main>
<script>
    document.getElementById('bookOnlineBtn').addEventListener('click', function () {
        alert('Позвоните по номеру телефона: +89132358320');
    });
</script>
<?php include "html/footer.php"; ?>