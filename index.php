<?php
    // Include shared header (and DB connection)
    include 'includes/header.php';
?>
  <!-- MAIN START -->
  <main>

    <!-- HERO -->
    <section class="hero">
      <div class="content">
        <h1>Welcome To <span class="primary-text">Traveler</span></h1>
        <br>
        <p>
          Discover the best hotels and unforgettable tours all in one place <br>
          Your next journey begins with <span class="primary-text">Traveler!</span>
        </p>
        <a href="hotelList.php" class="btnn btn-primaryy">Book</a>
      </div>
    </section>
    
    <section>
      <section class="album py-5 bg-body-tertiary" id="featuredHotels">
        <div class="container">
          <h2 class="text-center section-title">Hotels</h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
            <?php
      // Fetch hotel summaries for homepage cards
      $query = "SELECT AboutTheStay, MinimumPrice, MainImg FROM hotel";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
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
                  <small class='text-body-secondary'>From $$RoomPrice/night</small>
                </div>
              </div>
            </div>
            </div>";
        }
      }
        else {
          echo "No hotels found.";
        }
    ?> 
          </div>
        </div>
        <!-- Show More HOTELS -->
        <div class="text-center mb-5">
          <a href="hotelList.php" class="btnn btn-show-more" id="showMoreHotels">Show More</a>
        </div>
        <!-- HOTELS SECTION END -->

        <!-- TOURS SECTION START -->
        <div class="container">
          <h2 class="text-center section-title">TOURS</h2>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
        <?php
      // Fetch tour summaries for homepage cards
      $query = "SELECT AboutTheAdventure, MainImg FROM tour";
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $AboutTheAdv = $row['AboutTheAdventure'];
          $MainTourImg = $row['MainImg'];
          echo "            <div class='col'>
              <div class='card shadow-sm'>
                <img src='$MainTourImg' alt='MainTourImg' class='bd-placeholder-img card-img-top'
                  height='225' style='object-fit: cover;'>
                <div class='card-body'>
                  <p class='card-text'>
                    $AboutTheAdv
                  </p>
                </div>
              </div>
            </div>";
        }
      }
      else {
        echo "No tours found.";
      }
    ?> 
          <!-- TOURS SECTION END -->
        </div>
    </div>
            <div id="reviews" class="text-center mb-5">
            <a href="TourList.php" class="btnn btn-show-more" id="showMoreTours">Show More</a>
          </div>
          
        
        <!-- REVIEWS SECTION START -->
        <div class="container">
          <h2 class="text-center section-title">Trusted Reviews</h2>

          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card shadow-sm review-card">
                <div class="card-body">
                  <div class="review-header">
                    <svg class="review-avatar" width="60" height="60" xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                      <rect width="100%" height="100%" fill="#777"></rect>
                      <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle">AA</text>
                    </svg>
                    <div>
                      <div class="reviewer-name">Abdulrahman Alquzi</div>
                      <div class="visited-place">Four Seasons Hotel</div>
                    </div>
                  </div>
                  <div class="review-stars">★ ★ ★ ★ ☆</div>
                  <p class="review-text">
                    "The service was absolutely world-class. I have never experienced such luxury before. Highly
                    recommended!"
                  </p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card shadow-sm review-card">
                <div class="card-body">
                  <div class="review-header">
                    <svg class="review-avatar" width="60" height="60" xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                      <rect width="100%" height="100%" fill="#777"></rect>
                      <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle">FA</text>
                    </svg>
                    <div>
                      <div class="reviewer-name">Faisal Alrashdi</div>
                      <div class="visited-place">Al-Taif City Tour</div>
                    </div>
                  </div>
                  <div class="review-stars">★ ★ ★ ★ ☆</div>
                  <p class="review-text">
                    "A wonderful tour! The guide was very knowledgeable. We saw all the major sights in just one day."
                  </p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card shadow-sm review-card">
                <div class="card-body">
                  <div class="review-header">
                    <svg class="review-avatar" width="60" height="60" xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                      <rect width="100%" height="100%" fill="#777"></rect>
                      <text x="50%" y="50%" fill="#eceeef" dy=".3em" text-anchor="middle">BA</text>
                    </svg>
                    <div>
                      <div class="reviewer-name">Basim Alkhaldi</div>
                      <div class="visited-place">Shangri-La Hotel</div>
                    </div>
                  </div>
                  <div class="review-stars">★ ★ ★ ★ ★</div>
                  <p class="review-text">
                    "The most relaxing vacation I've had in years. The pool is amazing and the staff is super friendly."
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- REVIEWS SECTION END -->
        </div>
      </section>
  </main>
<?php
    // Include shared footer
    include 'includes/footer.php';
?>
