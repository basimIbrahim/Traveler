<?php
    include 'includes/header.php';
?>
  <main>
    <!-- hero -->
    <section class="hero" style="background-image: url('images/TourListimg.jpg'); height: 55vh;">
      <div class="content">
        <h1>Find Your Next <span class="primary-text">Adventure</span></h1>
        <br>
        <p>Handpicked Tours in every city, from mountains to deserts.</p>
        <a href="#featuredTours" class="btnn btn-primaryy">Explore Tours</a>
      </div>
    </section>
    <!-- Featured Tours Section -->
    <section class="album py-5 bg-body-tertiary" id="featuredTours">
      <div class="container">
        <h2 class="text-center section-title">Featured Tours</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
          <!--  Tour Card PHP Loop -->

          <?php
      $query = "SELECT TourID, AboutTheAdventure, TourPrice, MainImg FROM tour";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $TourID = $row['TourID'];
          $AboutTheAdventure = $row['AboutTheAdventure'];
          $TourPrice = $row['TourPrice'];
          $TourMainImg = $row['MainImg'];

          echo "
          <div class='col'>
            <div class='card shadow-sm'>
              <img src='$TourMainImg' alt='Tour Image' class='card-img-top'>
              <div class='card-body'>
                <p class='card-text'>$AboutTheAdventure</p>

                <div class='d-flex justify-content-between align-items-center'>
                  <a href='infoTour.php?id=$TourID' class='btn btn-sm btn-outline-secondary'>Book</a>
                  <small class='text-body-secondary'>From $TourPrice/Ticket</small>
                </div>
              </div>
            </div>
          </div>";
        }
      }
        else {
          echo "No tours found.";
        }
      ?>
          </div>

        <div class="text-center mb-5">
          <a href="#" class="btnn btn-show-more" id="showMoreHotels"> Back To Top</a>
        </div>
      </div>
    </section>
  </main>
<?php
    include 'includes/footer.php';
?>