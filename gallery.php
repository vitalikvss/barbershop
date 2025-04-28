<?php include "html/header.php"; ?>
<style>
  .masonry {
    column-count: 3;
    column-gap: 1rem;
  }

  .masonry-item {
    break-inside: avoid;
    margin-bottom: 1rem;
  }

  .masonry-item img {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  @media (max-width: 992px) {
    .masonry {
      column-count: 2;
    }
  }

  @media (max-width: 576px) {
    .masonry {
      column-count: 1;
    }
  }
</style>

<section style="background-color: #eee;">
  <div class="container py-5">
    <h4 class="text-center mb-5"><strong>Галерея</strong></h4>
    <div class="masonry">
      <?php
        $stmt = $conn->prepare("SELECT * FROM gallery");
        $stmt->execute();
        $Result = $stmt->get_result();

        if ($Result->num_rows > 0) {
          $gallery = $Result->fetch_all(MYSQLI_ASSOC);

          foreach ($gallery as $Img) {
            echo '
              <div class="masonry-item">
                <img src="img/' . htmlspecialchars($Img['Img']) . '">
              </div>
            ';
          }
        }
      ?>
    </div>
  </div>
</section>

<?php include "html/footer.php"; ?>
