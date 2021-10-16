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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="scripts/cart.js"></script>
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
    <!-- Page Content Start -->
    <div class="main-content">
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
                        echo "</a></td><td>";
                        // Creates a form and button that will submit and remove this item from the cart using lib/cart-remove.php
                        echo '<form method="POST" action="lib/cart-remove.php"><input type="hidden" name="product-id" value="' . $row["product_id"] . '"><input class="remove-button" type="submit" value="x"></form>';
                        echo "</td><td>";
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
      <form action="checkout.php">
          <input class="checkout-button" type="submit" value="Checkout">
      </form>
    </div>
    <!-- Page Content End -->
    <div class="footer">
      <table>
        <tr>
        <td>
            <h3>About</h3>
            <a href="about-us.html">About DispensarySA</a>
          </td>
          <td>
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:store@dispensarysa.com.au">store@dispensarysa.com.au</a></p>
            <p>Ph: <a href="tel:1800-420-420">1800 420 420</a></p>
          </td>
          <td>
            <h3>Follow Us</h3>
            <p><a href="https://www.facebook.com">Facebook</a></p>
            <p><a href="https://www.instagram.com">Instagram</a></p>
            <p><a href="https://www.twitter.com">Twitter</a></p>
          </td>
          <td>
            <h3>Location</h3>
            <p><a href="https://goo.gl/maps/rCKphGHHkdzFn4vJ6">420 King William Street</a></p>
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
