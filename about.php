<?php
  // Include shared header markup
  include 'includes/header.php';
?>
<main>
  <!-- Page section wrapper -->
  <section class="bg-body-tertiary" style="min-height: calc(100vh - 160px); padding: 90px 0 90px;">

    <!-- Centered container for title + team cards -->
    <div class="container d-flex flex-column align-items-center">
      <h1 class="text-center mb-3" style="margin-top: 24px; color: #ffffff;">About Our Team</h1>
      <p style="color: #ffffff !important; font-size: 18px;" class="text-center text-body-secondary mb-5">
        Five students At UQU Worked on <strong><span class="primary-text">Traveler</span></strong>.
      </p>

      <!-- Cards grid (1 column on small screens, 5 on md+) -->
      <div class="row row-cols-1 row-cols-md-5 g-3 w-100">
        <!-- Card 1 -->
        <div class="col d-flex">
          <div class="card team-card h-100 w-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Basim Alkhaldi 445005309</h5>
              <ul class="team-list">
                <li>Frontend/HTML/CSS</li>
                <li>Bootstrap</li>
                <li>Footer + Cards</li>
                <li>Hotel + Tour page</li>
                <li>Backend</li>
                <li>Database</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col d-flex">
          <div class="card team-card h-100 w-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Abdulrahman Alquzi 445003610</h5>
              <ul class="team-list">
                <li>Frontend/HTML/CSS</li>
                <li>Navbar + Hero layout</li>
                <li>JS</li>
                <li>Image optimization</li>
                <li>Logo designer</li>
                <li>Database</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col d-flex">
          <div class="card team-card h-100 w-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Faisal Alrashdi 44500087</h5>
              <ul class="team-list">
                <li>Frontend/HTML</li>
                <li>Hotels info Gathering</li>
                <li>Review section</li>
                <li>Database</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="col d-flex">
          <div class="card team-card h-100 w-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Abdulaziz Alzubaidi 445002223</h5>
              <ul class="team-list">
                <li>Frontend/HTML</li>
                <li>JS</li>
                <li>Image Optimization</li>
                <li>Database</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="col d-flex">
          <div class="card team-card h-100 w-100">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Abdullah Almarhabi 445002280</h5>
              <ul class="team-list">
                <li>Frontend/HTML</li>
                <li>Room info Gathering</li>
                <li>Image Optimization</li>
                <li>Database</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</main>
<?php
  // Include shared footer markup
  include 'includes/footer.php';
?>
