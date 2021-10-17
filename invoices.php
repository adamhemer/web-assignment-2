<!-- This page is not part of the website and is simply for demonstration purposes to -->
<!-- show that the invoices are being stored and linked to the products correctly. -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoices - DispensarySA</title>
    <meta
      name="Invoices"
      content="List of Invoices"
    />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/invoices.css" />
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
      <table class="invoice-pane">
        <thead>
          <tr>
            <th>invoice_no</th>
            <th>holder_name</th>
            <th>total</th>
            <th>card_number</th>
            <th>expiry</th>
            <th>cvv</th>
            <th>product_id</th>
            <th>name</th>
            <th>quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once "lib/dbconn.php";
            // Join the Invoice, ProductInvoice and Product tables to get the products linked to each invoice
            $sql = '
              SELECT i.invoice_no, i.holder_name, i.total, i.card_number, i.expiry, i.cvv, p.product_id, p.name, pi.quantity
              FROM Invoice i, ProductInvoice pi, Product p
              WHERE i.invoice_no = pi.invoice_no
              AND pi.product_id = p.product_id;
            ';

            $colour_alternate = false;
            $prev_invoice_no = 0;

            // Read through the results and print out each invoice and the assosciated products
            if ($result = mysqli_query($conn, $sql)) {
              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    // Check if the colour should alternate (new invoice)
                    if ($row["invoice_no"] != $prev_invoice_no) {
                      $colour_alternate = !$colour_alternate;
                    }
                    // Set background colour
                    if ($colour_alternate) {
                      echo '<tr class="colour-a">';
                    } else {
                      echo '<tr class="colour-b">';
                    }

                    // If this is a new invoice, write out the details once
                    if ($row["invoice_no"] != $prev_invoice_no) {
                      $prev_invoice_no = $row["invoice_no"];

                      echo '<td>' . substr(str_repeat(0, 3).$row["invoice_no"], - 4) . '</td>';
                      echo '<td>' . $row["holder_name"] . '</td>';
                      echo '<td>' . $row["total"] . '</td>';
                      echo '<td>' . $row["card_number"] . '</td>';
                      echo '<td>' . $row["expiry"] . '</td>';
                      echo '<td>' . $row["cvv"] . '</td>';
                    } else {  // Otherwise skip the customer details
                      echo '<td></td><td></td><td></td><td></td><td></td><td></td>';
                    }
                    
                    // Write out the product
                    echo '<td>' . $row["product_id"] . '</td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>' . $row["quantity"] . '</td>';
                    echo '</tr>';
                  }
              }
              mysqli_free_result($result);
            }
            mysqli_close($conn);

          ?>
        </tbody>
      </table>
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
        <p>Copyright © 2021 Dispensary SA</p>
        <!-- <i class="fa fa-cc-visa"></i> -->
        <!-- <i class="fa fa-credit-card"></i> -->
      </div>
    </div>
  </body>
</html>
