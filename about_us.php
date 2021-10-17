<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About Us - DispensarySA</title>
    <meta name="About DispensarySA" content="Information About DispensarySA" />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/about_us.css" />
    <script
      src="https://kit.fontawesome.com/089f98c1d5.js"
      crossorigin="anonymous"
    ></script>
    <script src="scripts/about_us.js"></script>
  </head>
  <body>
    <nav class="navbar">
      <a href="landing.php" id="logo-text">DispensarySA</a>
      <div class="navbar-right">
        <a href="landing.php">Home <i class="fa fa-home"></i></a>
        <a href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
        <a class="navbar-active" href="about_us.php"
          >About <i class="fa fa-info-circle"></i
        ></a>
        <a href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <!-- Page Content Start -->
    <div class="main-content">
      <div class="backdrop-container">
        <img src="img/about-us-images/backdrop.jpg" class="backdrop" />
      </div>
      <div class="maintext-backdrop">
        <div class="maintext-flex">
          <div class="about-container">
            <h1>What we're about</h1>
            <p>
              DispensarySA is dedicated to supporting Australians in
              experiencing the incredible healing potential of medicinal
              cannabis. Our team collectively has over 30 years experience in
              the cultivation and production of alternative therapies and we're
              getting better every day! The opportunity to make a difference is
              truly what gets us out of bed in the morning.
            </p>
            <p>Curious? Subscribe to our mailing list for the latest news.</p>
          </div>

          <div class="ourpeople-container">
            <h1>Our People</h1>
            <p>
              The staff at DispensarySA come from all walks of life, but
              something that we all have in common is you. We've dedicated our
              lives to discovering the most effective cannabinoid therapies for
              an ever-growing list of conditions.
            </p>
            <p>
              Now, we know it's true that we won't be able to help everyone. But
              if you're not feeling 100%, you can bet that we'll try our best to
              find a treatment for you.
            </p>
          </div>
        </div>
      </div>

      <?php

        require_once "lib/dbconn.php";

        echo '<div id="subscribe-container">';
        echo '<form action="lib/email-add.php" method="POST" onsubmit="showMessage">';
        echo '<label for="email">Subscribe to our newsletter</label><br>';
        echo '<input type="email" placeholder="Enter your email here" name="email">';
        echo '<p id="thankyou">Thankyou for subscribing!</p>';
        echo '</div>';
        
        mysqli_close($conn);
      ?>
      </div>
    </div>
    <!-- Page Content End -->
    <div class="footer">
      <table>
        <tr>
          <td>
            <h3>About</h3>
            <a href="about_us.php">About DispensarySA</a>
          </td>
          <td>
            <h3>Contact Us</h3>
            <p>
              Email:
              <a href="mailto:store@dispensarysa.com.au"
                >store@dispensarysa.com.au</a
              >
            </p>
            <p>Ph: <a href="tel:1800-420-420">1800 420 420</a></p>
          </td>
          <td>
            <h3>Location</h3>
            <p>
              <a href="https://goo.gl/maps/rCKphGHHkdzFn4vJ6"
                >420 King William Street</a
              >
            </p>
            <p>Adelaide SA, 5000</p>
          </td>
          <td>
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com">
              <i class="fab fa-facebook-square socials"></i
            ></a>
            <a href="https://www.instagram.com"
              ><i class="fab fa-instagram-square socials"></i
            ></a>
            <a href="https://www.twitter.com"
              ><i class="fab fa-twitter-square socials"></i
            ></a>
          </td>
        </tr>
      </table>
      <div class="footer-base">
        <p>Copyright © 2021 Dispensary SA</p>
        <!-- <i class="fa fa-cc-visa"></i> -->
        <!-- <i class="fa fa-credit-card"></i> -->
      </div>
    </div>
  </body>
</html>
