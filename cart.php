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
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="cart.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>

  <body>
    <nav class="navbar">
      <a href="landing.html" id="logo-text">DispensarySA</a>
      <div class="navbar-right">
        <a href="landing.html">Home <i class="fa fa-home"></i></a>
        <a href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
        <a href="about_us.html">About <i class="fa fa-info-circle"></i></a>
        <a class="navbar-active" href="">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <div class="main-content">
      <table class="cart-list">
        <thead>
          <tr>
            <th id="column-item">Item</th>
            <th id="column-price">Price</th>
            <th id="column-quantity">Quantity</th>
            <th id="column-subtotal">Sub-Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Item</td>
            <td>$2.00</td>
            <td>7</td>
            <td>$14.00</td>
          </tr>
          <tr>
            <td>Item</td>
            <td>$2.00</td>
            <td>7</td>
            <td>$14.00</td>
          </tr>
          <tr>
            <td>Item</td>
            <td>$2.00</td>
            <td>7</td>
            <td>$14.00</td>
          </tr>
          <tr>
            <td>Item</td>
            <td>$2.00</td>
            <td>7</td>
            <td>$14.00</td>
          </tr>
          <tr>
            <td>Item</td>
            <td>$2.00</td>
            <td>7</td>
            <td>$14.00</td>
          </tr>
        </tbody>
        <tfoot>
          <td style="border: none;"></td>
          <td style="border: none;"></td>
          <td style="text-align: center; font-weight: bold;">Total:</td>
          <td style="font-weight: bold;">$69.00</td>
        </tfoot>
      </table>
      <button class="checkout-button">Checkout</button>
    </div>
    <div class="footer">
      <table>
        <tr>
          <td>
            <h3>About</h3>
            <p>Text and Logos</p>
          </td>
          <td>
            <h3>Contact Us</h3>
            <p>Email: store@dispensarysa.com.au</p>
            <p>Ph: 1800 420 420</p>
          </td>
          <td>
            <h3>Follow Us</h3>
            <p>Facebook</p>
            <p>Instagram</p>
            <p>Twitter</p>
          </td>
          <td>
            <h3>Location</h3>
            <p>0 King William Street</p>
            <p>Adelaide</p>
            <p>SA 5000</p>
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
