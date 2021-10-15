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
    <link rel="stylesheet" href="styles/cart.css" />
    <link rel="stylesheet" href="styles/checkout.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="scripts/cart.js"></script>
    <script src="scripts/checkout.js"></script>
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
    <div class="main-content">
      <table class="content-divider">
        <tr>
          <td>
            <h3>Payment Details</h3>
            <form id="credit-card-form" name="credit-card-form" action="lib/place-order.php" method="POST">
              <label for="name">Name on card</label><br>
              <input name="name" type="text" placeholder="Name" maxlength=25 autocomplete="off" required><br>
              <label for="number">Card number</label><br>
              <input name="number" type="text" placeholder="1111 2222 3333 4444" maxlength=19 autocomplete="off" required><br>
              <label for="expiry">Expiry date</label><br>
              <input name="expiry" type="text" placeholder="01/21" autocomplete="off" required><br>
              <label for="cvv">CVV</label><br>
              <input name="cvv" type="text" placeholder="000" autocomplete="off" required>
            </form>
          </td>
          <td>
            <h3>Order Summary</h3>
            <table class="cart-list">
              <thead>
                <tr>
                  <th id="column-item">Item</th>
                  <th id="column-remove"></th>
                  <th id="column-price">Price</th>
                  <th id="column-quantity">Quantity</th>
                  <th id="column-subtotal">Sub-Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  require_once "lib/dbconn.php";

                  function toFixed($input, $decimals) {
                    return number_format($input, $decimals, '.', '');
                  }

                  $sql = "SELECT * FROM Cart c JOIN Product p ON c.product_id = p.product_id ORDER BY name ASC;";
                  $total = 0;
                  if ($result = mysqli_query($conn, $sql)) {
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              echo '<tr><td><a class="cart-item-name" href="product.php?id=' . $row["product_id"] . '">';
                              echo $row["name"];
                              echo "</a></td><td></td><td>";
                              echo toFixed($row["price"], 2);
                              echo "</td><td>";
                              echo $row["quantity"];
                              echo "</td><td>";
                              echo toFixed($row["price"] * $row["quantity"], 2);
                              echo "</td></tr>";
                              $total += $row["price"] * $row["quantity"];
                          }
                      }
                      mysqli_free_result($result);
                  }
                  echo '<div id="hidden-total" style="display: none">' . $total . "</div>";
                  mysqli_close($conn);
                ?>
              </tbody>
              <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center; font-weight: bold;">Total:</td>
                <td id="cart-total" style="font-weight: bold;">$69.00</td>
              </tfoot>
            </table>
          </td>
        </tr>
      </table>
      <button class="checkout-button" onclick="validateCard()">Place Order</button>
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
