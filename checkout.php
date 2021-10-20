<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout - DispensarySA</title>
    <meta
      name="Checkout"
      content="Your Checkout"
    />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/cart.css" />
    <link rel="stylesheet" href="styles/checkout.css" />
    <script
      src="https://kit.fontawesome.com/089f98c1d5.js"
      crossorigin="anonymous"
    ></script>
    <script src="scripts/cart.js"></script>
    <script src="scripts/checkout.js"></script>
  </head>
  <body>
    <nav class="navbar">
      <a href="landing.php" id="logo-text">DispensarySA</a>
      <div class="navbar-right">
        <a href="landing.php">Home <i class="fa fa-home"></i></a>
        <a href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
        <a href="about_us.php">About <i class="fa fa-info-circle"></i></a>
        <a class="navbar-active" href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <!-- Page Content Start -->
    <div class="main-content">
      <table class="content-divider">
        <tr>
          <td>
            <h3>Payment Details</h3>
            <!-- Credit card form, sends details to place-order.php via POST for processing -->
            <form id="credit-card-form" name="credit-card-form" action="lib/place-order.php" method="POST">
              <label for="name">Name on card</label><br>
              <input name="name" type="text" placeholder="Name" maxlength=25 autocomplete="off" oninput="this.setCustomValidity('')" required><br>
              <label for="number">Card number</label><br>
              <input name="number" type="text" placeholder="1111 2222 3333 4444" maxlength=19 autocomplete="off" oninput="this.setCustomValidity('')" required><br>
              <label for="expiry">Expiry date</label><br>
              <input name="expiry" type="text" placeholder="01/21" autocomplete="off" oninput="this.setCustomValidity('')" required><br>
              <label for="cvv">CVV</label><br>
              <input name="cvv" type="text" placeholder="000" autocomplete="off" oninput="this.setCustomValidity('')" required>
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

                  // Decimal formatting function
                  function toFixed($input, $decimals) {
                    return number_format($input, $decimals, '.', '');
                  }
                  
                  // Get the product details for the items in the cart to display on the page
                  $sql = "SELECT * FROM Cart c JOIN Product p ON c.product_id = p.product_id ORDER BY name ASC;";
                  $total = 0;
                  if ($result = mysqli_query($conn, $sql)) {
                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                              // Create the table entries for each item
                              echo '<tr><td><a class="cart-item-name" href="product.php?product_id=' . $row["product_id"] . '">';
                              echo $row["name"];
                              echo "</a></td><td></td><td>";
                              echo toFixed($row["price"], 2);
                              echo "</td><td>";
                              echo $row["quantity"];
                              echo "</td><td>";
                              // Calculate the subtotals
                              echo toFixed($row["price"] * $row["quantity"], 2);
                              echo "</td></tr>";
                              // Add the subtotal to the grand total
                              $total += $row["price"] * $row["quantity"];
                          }
                      }
                      mysqli_free_result($result);
                  }
                  // Put the total into a hidden div to pass to JS
                  echo '<div id="hidden-total" style="display: none">' . $total . "</div>";
                  mysqli_close($conn);
                ?>
              </tbody>
              <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center; font-weight: bold;">Total:</td>
                <!-- Display the total at the bottom, this value is filled in by JS automatically -->
                <td id="cart-total" style="font-weight: bold;">?</td>
              </tfoot>
            </table>
          </td>
        </tr>
      </table>
      <a class="continue-shopping" href="cart.php">Back To Cart</a>
      <!-- Submit button for the checkout, the js will check the card inputs before submitting the form -->
      <button class="checkout-button" onclick="validateCard()">Place Order</button>
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
            <p>Email: <a href="mailto:store@dispensarysa.com.au">store@dispensarysa.com.au</a></p>
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
        <!-- Hidden link to the invoices page for testing and demonstration purposes -->
        <p>Copyright <a style="color: white;" href="invoices.php">©</a> 2021 Dispensary SA</p>
      </div>
    </div>
  </body>
</html>
