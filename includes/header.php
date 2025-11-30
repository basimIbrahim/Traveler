<?php
include 'config/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentUser = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/RegstSign.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/payment.css" rel="stylesheet" />
  <script src="js/color-modes.js"></script>
  <title>Traveler</title>
</head>
<body>
  <!-- HEADER START -->
  <header>
    <div id="navBar">
      <div>
        <a href="index.php"><img src="images/logo.png" alt="Traveler" /></a>
      </div>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="hotelList.php">Hotels</a></li>
          <li><a href="TourList.php">Tours</a></li>
          <li><a href="about.php">About</a></li>

          <?php if ($currentUser): ?>
            <li><a href="#" aria-disabled="true"><?php echo htmlspecialchars($currentUser['UserName']); ?></a></li>
            <li><a href="logout.php">Log out</a></li>
          <?php else: ?>
            <li><a href="#signin-modal" id="openSignIn">Sign in</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>
  <!-- HEADER END -->
