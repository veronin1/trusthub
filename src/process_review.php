<?php
require 'database_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $submittedMovieId   = (int) $_POST['movie_id'];
  $submittedRating    = (int) $_POST['rating'];
  $submittedReviewText = $conn->real_escape_string($_POST['review']);

  // insert into reviews table
  $conn->query("
    INSERT INTO reviews (movie_id, rating, review)
    VALUES ($submittedMovieId, $submittedRating, '$submittedReviewText')
  ");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- JetBrains Mono font -->
  <link 
    href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&display=swap" 
    rel="stylesheet">
  <!-- styling -->
  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/homepage.css">
</head>
<body>

  <!-- navbar -->
  <nav class="navbar">
    <div class="logo">
      <a href="index.php"><img src="images/logo.jpg" alt="TrustHub Logo"></a>
      <a href="index.php"><h1>TrustHub Reviews</h1></a>
    </div>
    <div class="nav-items">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="movies.php">Browse Movies</a></li>
      </ul>
    </div>
  </nav>

  <!-- page header -->
  <header class="page-header">
    <h2>Review Processed!</h2>
  </header>

  <!-- main content -->
  <main class="content">
    <section class="featured-section">
      <!-- reuse about-text as a card for the message -->
      <div class="about-text">
        <p>Your review has been added.</p>
        <p>
          <a href="movie.php?id=<?php echo htmlentities($submittedMovieId); ?>">
            Back to Movie Details
          </a>
        </p>
      </div>
    </section>
  </main>

  <div class="about-img" style="max-width: 400px; margin: 20px auto;">
      <img src="images/thank_you.png" alt="image of text saying Thank you">
  </div>

  <!-- footer -->
  <footer class="site-footer">
    <p>© 2025 TrustHub Movie Reviews | Harry Newman</p>
  </footer>

</body>
</html>
