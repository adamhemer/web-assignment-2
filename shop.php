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
    <link rel="stylesheet" href="styles/shop.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="shop.js"></script>
  </head>

  <body>
    <nav class="navbar">
      <a href="landing.html" id="logo-text">DispensarySA</a>
      <div class="navbar-right">
        <a href="landing.html">Home <i class="fa fa-home"></i></a>
        <a class="navbar-active" href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
        <a href="about_us.html">About <i class="fa fa-info-circle"></i></a>
        <a href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
      </div>
    </nav>
    <div class="main-content">
      <div class="shop-header">
        <a href="">Shop</a>
        >
        <a href="">All Products</a>
      </div>
      <table class="shop-content">
        <tr>
          <td class="shop-sidebar">
            <div class="shop-filters">
              <p class="filter-headings">Sort By</p>
              <select class="filter-select" onchange="sort(this.value)">
                <option value="0">Name: A-Z</option>
                <option value="1">Name: Z-A</option>
                <option value="2">Price: Low-High</option>
                <option value="3">Price: High-Low</option>
              </select>
              <hr>
              <p class="filter-headings">Categories</p>
              <input type="checkbox" name="cat1">
              <label for="cat1">Category 1</label>
              <br>
              <input type="checkbox" name="cat2">
              <label for="cat2">Category 2</label>
              <button onclick="sort()">Sort</button>
            </div>
          </td>
          <td id="prdl" class="shop-products">
            <?php
            require_once "lib/dbconn.php";

            $sql = "SELECT * FROM Product;";

            function product($id, $price, $size, $name, $description) {
              echo '<a id="prd" href="product.php?id=' . $id . '" class="shop-item">';
              echo '<img src="img/' . $id . '.png" alt="">';
              echo '<h3 class="item-name">' . $name . '</h3>';
              echo '<h3 class="item-price">' . $price . '</h3>';
              echo '<p class="item-quantity">per' . $size . 'g</p>';
              echo '<button>Add to cart</button>';
              echo '</a>';
            }

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        product($row["id"], $row["price"], $row["size"], $row["name"], $row["description"]);
                    }
                }
                mysqli_free_result($result);
            }
            mysqli_close($conn);
            ?>
            <!-- <a id="prd" href="#" class="shop-item">
              <img src="img/placeholder.jpg" alt="">
              <h3 class="item-name">Product Name</h3>
              <h3 class="item-price">$19.99</h3>
              <p class="item-quantity">per 100g</p>
              <button>Add to cart</button>
            </a> -->
          </td>
        </tr>
      </table>
    </div>
    <script>
      // var item = document.getElementById("prd");
      // var dest = document.getElementById("prdl");
      // for (let i = 0; i < 15; i++) {
      //   dest.appendChild(item.cloneNode(true)); 
      // }
    </script>
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
