<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>I need an expert</title>
  <link rel="stylesheet" href="/res/style.css">
</head>
<body>
  <div class="home-hero-section">
    <div class="headerenclosure">
      <div class="header">
        <div class="header-container">
          <div class="header-logo">
            <a href="/"><img src="/res/logo/logo_small_white.png" alt=""></a>
          </div>
          <?php
          include('navbar.php');
          ?>
        </div>

      </div>
    </div>
    <div class="page-container">
      <div class="home_tagline">
          <img src="res/question.png" alt="image isn't working lol"/>
            <p style="text-align: center;">I need an expert is a video calling platform which connects experts to learners that need a hand.</p>
          <img src="res/sellingpitch.png" alt="more stuff isn't loading lol" />
      </div>
      <div class="search-form">
        <form action="/search.php" method="post">
          <input type="text" placeholder="What are you stuck on? (e.g. 'drawing')">
          <input type="submit" value="Search">
        </form>
          <div style="padding-top: 55px;"></div>
          <a class="icanhelp" href="register.php">Do you have expertise to share?</a>
      </div>
    </div>
  </div>
</body>
</html>
