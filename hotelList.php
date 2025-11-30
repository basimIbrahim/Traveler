<?php
    // Include shared header (assumes DB connection is set up there)
    include 'includes/header.php';
?>
  <main>
    <!-- Hero -->
    <section class="hero" style="background-image: url('images/Abha.jpeg'); height: 55vh;">
      <div class="content">
        <h1>Find Your Next <span class="primary-text">Stay</span></h1>
        <br>
        <p>Handpicked hotels in every city, from boutique retreats to luxury escapes.</p>
        <a href="#featuredHotels" class="btnn btn-primaryy">Explore Hotels</a>
      </div>
    </section>
    <!-- Featured Hotels Section -->
    <section class="album py-5 bg-body-tertiary" id="featuredHotels">
      <div class="container">
        <h2 class="text-center section-title">Featured Hotels</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
          <?php
      // Fetch basic hotel info to display cards
      $query = "SELECT HotelID, AboutTheStay, MinimumPrice, MainImg FROM hotel";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        // Loop through hotels and render each card
        while($row = mysqli_fetch_assoc($result)) {
          $HotelID = $row['HotelID'];
          $AboutTheStay = $row['AboutTheStay'];
          $RoomPrice = $row['MinimumPrice'];
          $HotelMainImg = $row['MainImg'];
          echo "
          <div class='col'>
            <div class='card shadow-sm'>
              <img src='$HotelMainImg' alt='Hotel Image' class='card-img-top'>
              <div class='card-body'>
                <p class='card-text'>$AboutTheStay</p>
                <div class='d-flex justify-content-between align-items-center'>
                <a href='infoHotel.php?id=$HotelID' class='btn btn-sm btn-outline-secondary'>Book</a>
                  <small class='text-body-secondary'>From $$RoomPrice/night</small>
                </div>
              </div>
            </div>
            </div>";
        }
      }
        else {
          // Fallback message if no hotels are found
          echo "No hotels found.";
        }
    ?> 
        </div>

        <div class="text-center mb-5">
          <a href="#" class="btnn btn-show-more" id="showMoreHotels">Back To Top</a>
        </div>
      </div>
    </section>
  </main>

<?php
    // Include shared footer
    include 'includes/footer.php';
?>
