<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Products - DispensarySA</title>
    <meta
      name="Products"
      content="Product List"
    />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/shop.css" />
    <script
      src="https://kit.fontawesome.com/089f98c1d5.js"
      crossorigin="anonymous"
    ></script>
    <script src="scripts/shop.js"></script>
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
              <input type="checkbox" name="m" onchange="setCategory('m')">
              <label for="cat1">Marijuana</label>
              <br>
              <input type="checkbox" name="e" onchange="setCategory('e')">
              <label for="cat2">Edible</label>
              <p class="filter-headings">Strains</p>
              <input type="checkbox" name="indica" onchange="setStrain('indica')">
              <label for="indica">Indica</label>
              <br>
              <input type="checkbox" name="sativa" onchange="setStrain('sativa')">
              <label for="sativa">Sativa</label>
              <br>
              <input type="checkbox" name="hybrid" onchange="setStrain('hybrid')">
              <label for="hybrid">Hybrid</label>
              
            </div>
          </td>
          <td id="prdl" class="shop-products">
            <!-- <a id="prd" href="#" class="shop-item">
              <img src="img/placeholder.png" alt="">
              <h3 class="item-name">Product Name</h3>
              <h3 class="item-price">$19.99</h3>
              <p class="item-quantity">per 100g</p>
              <button>Add to cart</button>
            </a> -->
            <?php
            require_once "lib/dbconn.php";

            $sql = "SELECT * FROM Product;";

            function product($id, $price, $size, $name, $description) {
              // Div wrapper for styling
              echo '<div class="shop-item">';
              // Anchor to make the whole section clickable
              echo '<a id="prd" href="product.php?product_id=' . $id . '">';
              echo '<img src="img/prod/' . $id . '.png" alt="">';
              echo '<h3 class="item-name">' . $name . '</h3>';
              echo '<h3 class="item-price">' . $price . '</h3>';
              echo '<p class="item-quantity">per ' . $size . 'g</p></a>';
              // Form with the product id and name, necessary for the add to cart button
              echo '<form action="lib/cart-add.php" method="POST">';
              echo '<input type="hidden" name="product_id" value="' . $id . '">';
              echo '<input type="hidden" name="product_quantity" value="1">';
              echo '<input type="submit" value="Add to cart"></form>';
              // Hidden divs for JS to read when filtering/sorting
              echo '<div style="display: none">' . $description . '</div>';
              echo '<div style="display: none">' . $id . '</div>';
              echo '</div>';
            }

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        product($row["product_id"], $row["price"], $row["size"], $row["name"], $row["description"]);
                    }
                }
                mysqli_free_result($result);
            }
            mysqli_close($conn);
            ?>

          </td>
        </tr>
      </table>
    </div>
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
      </div>
    </div>
  </body>
</html>
