<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Template - DispensarySA</title>
    <meta
      name="description"
      content="A simple HTML5 Template for new projects."
    />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/complete.css" />
    <script
      src="https://kit.fontawesome.com/089f98c1d5.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <nav class="navbar">
      <a href="landing.html" id="logo-text">DispensarySA</a>
      <div class="navbar-right">
        <a href="landing.html">Home <i class="fa fa-home"></i></a>
        <a href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
        <a href="about_us.html">About <i class="fa fa-info-circle"></i></a>
        <a class="navbar-active" href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <!-- Page Content Start -->
    <div class="main-content">
      <div class="center-div">
        <h3>Order placed!</h3>
        <!-- Grab the invoice number from the URL and display it -->
        <h3>Your order number is <?php echo '#'; printf("%04d", $_GET["invoice_no"]); ?></h3>
        <a href="landing.html">Homepage</a>
      </div>
    </div>
    <!-- Page Content End -->
    <div class="footer">
      <table>
        <tr>
          <td>
            <h3>About</h3>
            <a href="about_us.html">About DispensarySA</a>
          </td>
          <td>
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:store@dispensarysa.com.au">store@dispensarysa.com.au</a></p>
            <p>Ph: <a href="tel:1800-420-420">1800 420 420</a></p>
          </td>
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
      </div>
    </div>
  </body>
</html>
