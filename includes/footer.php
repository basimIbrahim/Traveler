<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
  <!-- FOOTER START -->
  <div id="footer">
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <!-- Footer Main links -->
          <div class="col-6 col-md-2 mb-3">
            <h5>Traveler</h5>
            <br>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-body-secondary">Home</a></li>
              <li class="nav-item mb-2"><a href="about.php" class="nav-link p-0 text-body-secondary">About Us</a></li>
              <li class="nav-item mb-2"><a href="about.php" class="nav-link p-0 text-body-secondary">Contact Us</a></li>
            </ul>
          </div>

          <!-- Footer Booking links -->
          <div class="col-6 col-md-2 mb-3">
            <h5>Booking</h5>
            <br>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="hotelList.php" class="nav-link p-0 text-body-secondary">Hotels</a></li>
              <li class="nav-item mb-2"><a href="TourList.php" class="nav-link p-0 text-body-secondary">Tours</a></li>
              <li class="nav-item mb-2"><a href="#reviews" class="nav-link p-0 text-body-secondary">Reviews</a></li>
            </ul>
          </div>

          <!-- FooterLogo Back to top -->
          <div class="col-6 col-md-2 mb-3" style="scroll-behavior: smooth;">
            <div><a href="#top"><img src="images/logo.png" alt="Traveler" /></a></div>
          </div>

          <!-- Footer Column: Newsletter form -->
          <div class="col-md-5 offset-md-1 mb-3">
            <form method="post" action="newsletter.php">
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="email" name="email" class="form-control" placeholder="Email address" />
                <button class="btn btn-primary" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
          <p>&copy; 2025 Traveler, Inc. All rights reserved.</p>
        </div>
      </footer>
    </div>
  </div>
  <!-- FOOTER END -->

  <!-- SIGN-IN POPUP -->
  <div id="signin-modal" class="signin-backdrop" style="display:none;">
    <div class="signin-card">
      <button type="button" class="signin-close" id="closeSignIn">&times;</button>
      <h3 class="mb-3">Sign In</h3>
      <?php if (!empty($_SESSION['auth_error']) && ($_SESSION['auth_context'] ?? '') === 'login'): ?>
        <div class="alert alert-danger py-2"><?php echo htmlspecialchars($_SESSION['auth_error']); ?></div>
      <?php endif; ?>
      <form method="post" action="auth.php">
        <input type="hidden" name="form_type" value="login" />
        <div class="mb-3">
          <label for="signinEmail" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="signinEmail" placeholder="you@example.com" required />
        </div>
        <div class="mb-3">
          <label for="signinPassword" class="form-label">Password</label>
          <input name="password" type="password" class="form-control" id="signinPassword" placeholder="••••••••" required />
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <a href="#" class="text-body-secondary">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100">Sign In</button>
      </form>
      <p class="text-center mt-3 mb-0 text-body-secondary">
        New here?
        <a href="#register-modal" id="openRegisterFromSignIn" class="text-decoration-none">Create an account</a>
      </p>
    </div>
  </div>

    <!-- REGISTER POPUP -->
  <div id="register-modal" class="signin-backdrop" style="display:none;">
    <div class="signin-card">
      <button type="button" class="signin-close" id="closeRegister">&times;</button>
      <h3 class="mb-3">Register</h3>
      <?php if (!empty($_SESSION['auth_error']) && ($_SESSION['auth_context'] ?? '') === 'register'): ?>
        <div class="alert alert-danger py-2"><?php echo htmlspecialchars($_SESSION['auth_error']); ?></div>
      <?php endif; ?>
      <form method="post" action="auth.php">
        <input type="hidden" name="form_type" value="register" />
        <div class="mb-3">
          <label for="registerName" class="form-label">Name</label>
          <input name="UserName" type="text" class="form-control" id="registerName" placeholder="Your name" required />
        </div>
        <div class="mb-3">
          <label for="registerEmail" class="form-label">Email</label>
          <input name="Email" type="email" class="form-control" id="registerEmail" placeholder="you@example.com" required />
        </div>
        <div class="mb-3">
          <label for="registerPassword" class="form-label">Password</label>
          <input name="Password" type="password" class="form-control" id="registerPassword" placeholder="********" required />
        </div>
        <div class="mb-3">
          <label for="registerConfirm" class="form-label">Confirm Password</label>
          <input name="ConfirmPassword" type="password" class="form-control" id="registerConfirm" placeholder="********" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Create Account</button>
      </form>
      <p class="text-center mt-3 mb-0 text-body-secondary">
        Already have an account?
        <a href="#signin-modal" id="openSignInFromRegister" class="text-decoration-none">Sign in</a>
      </p>
    </div>
  </div>

  <?php
  // expose auth context for error handling
  $authContext = $_SESSION['auth_context'] ?? '';
  $hasAuthError = !empty($_SESSION['auth_error']);
  ?>

  <script src="js/RegisterSignin.js" defer></script>
  <script src="js/color-modes.js"></script>
  <script src="js/payment.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var hasError = <?php echo $hasAuthError ? 'true' : 'false'; ?>;
      var context = '<?php echo $authContext; ?>';
      if (!hasError) return;

      if (context === 'login') {
        var signIn = document.getElementById('signin-modal');
        if (signIn) signIn.style.display = 'flex';
      } else if (context === 'register') {
        var reg = document.getElementById('register-modal');
        if (reg) reg.style.display = 'flex';
      }
      document.body.style.overflow = 'hidden';
    });
  </script>
  <?php
  // Clear flash messages once displayed
  unset($_SESSION['auth_error'], $_SESSION['auth_success'], $_SESSION['auth_context']);
  ?>
</body>
</html>