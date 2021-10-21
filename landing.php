<!DOCTYPE html>
<html lang="en">
  <!-- Head section with Boilerplate meta tags, title, and stylesheets-->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home - DispensarySA</title>
    <meta
      name="description"
      content="A simple HTML5 Template for new projects."
    />
    <meta name="Group 10" content="DispensarySA" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/landing.css" />
    <script
      src="https://kit.fontawesome.com/089f98c1d5.js"
      crossorigin="anonymous"
    ></script>
    <script>
      <script src="scripts/landing.js"></script>
    </script>
  </head>

  <body>
    <!-- Parent container for whole body -->
    <div class="container">
      <!-- Navbar -->
      <nav class="navbar">
        <a href="landing.php" id="logo-text">DispensarySA</a>
        <div class="navbar-right">
          <a class="navbar-active" href="landing.php"
            >Home <i class="fa fa-home"></i
          ></a>
          <a href="shop.php">Shop <i class="fa fa-shopping-bag"></i></a>
          <a href="about_us.php">About <i class="fa fa-info-circle"></i></a>
          <a href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
        </div>
      </nav>
      <!-- Container for main content -->
      <div class="main-content">
        <section class="hero-section">
          <div class="hero-image-container">
            <img src="img/splash.jpg" class="hero-image" />
          </div>
          <div class="hero-text-container">
            <h1 class="hero-overlay hero-overlay-text">
              Australia's Leading Dispensary of Medicinal Marijuana
            </h1>
            <div class="hero-text-container"></div>
            <a href="shop.php" class="hero-overlay hero-overlay-button">
              Shop Now
            </a>
          </div>
        </section>
        <!-- Container for consultant banner -->
        <div class="consultant-banner">
          <!-- Vector images -->
          <img
            class="float-left"
            src="img/landing-images/floral-vector-art-left.png"
            alt="floral-vector-art"
          />
          <img
            class="float-right"
            src="img/landing-images/floral-vector-art-right.png"
            alt="floral-vector-art"
          />
          <!-- Welcome Text -->
          <h1>Sit back and relax. We'll take care of you.</h1>
          <h2>
            Click
            <span
              class="link"
              onclick="alert('Our Consultants are all currently busy.\nPlease try again later.')"
              >here</span
            >
            to contact one of our consultants
          </h2>
        </div>
        <!-- Container for information grid -->
        <div class="grid-container">
          <!-- Mission Statement -->
          <div id="mission-image" class="grid-section">
            <img
              src="img/landing-images/female-doctor.jpg"
              alt="female-doctor"
            />
          </div>
          <div id="mission-text" class="grid-section">
            <div class="grid-section-text">
              <h1>Our Mission</h1>
              <p>
                Here at DispensarySA, we pride ourselves on providing the
                highest quality medicinal cannabis in Australia. Our goal is to
                help all eligible Australians gain access to our legally and
                ethically distributed Cannabinoid products, grown and produced
                locally in our state-of-the-art laboratories.
              </p>
              <button
                class="grid-button"
                onclick="window.open('about_us.php', '_self')"
              >
                Learn More About Us >
              </button>
            </div>
          </div>
          <!-- Regulatory Info -->
          <div id="regulation-text" class="grid-section">
            <div class="grid-section-text">
              <h1>Regulatory Information</h1>
              <p>
                In Australia, each state will have different laws surrounding
                the use and legal distribution of medicinal cannabis. Please use
                the link below to visit your local state government website for
                more information.
              </p>
              <!-- Dropdown Menu -->
              <button
                onmouseover="showMenu()"
                onmouseout="showMenu()"
                class="grid-button dropbtn"
              >
                Visit Your Local Government Website >
              </button>
              <div
                onmouseover="showMenu()"
                onmouseout="showMenu()"
                id="myDropdown"
                class="dropdown-content"
              >
                <a
                  href="https://www.medicinalcannabis.nsw.gov.au/patients"
                  target="blank_"
                  >NSW Government</a
                >
                <a
                  href="https://www2.health.vic.gov.au/public-health/drugs-and-poisons/medicinal-cannabis/patients-carers"
                  target="blank_"
                  >Victoria Goverment</a
                >
                <a
                  href="https://www.qld.gov.au/health/conditions/all/medicinal-cannabis"
                  target="blank_"
                  >Queensland Health</a
                >
                <a
                  href="https://www.sahealth.sa.gov.au/wps/wcm/connect/public+content/sa+health+internet/conditions/medicines/medicinal+cannabis/medicinal+cannabis+patient+access+in+south+australia"
                  target="blank_"
                  >SA Health</a
                >
                <a
                  href="https://www.healthywa.wa.gov.au/Articles/A_E/Cannabis"
                  target="blank_"
                  >Healthy WA</a
                >
                <a
                  href="https://www.health.act.gov.au/sites/default/files/2018-09/Medicinal%20Cannabis%20-%20Patient%20Information_0.pdf"
                  target="blank_"
                  >ACT Health</a
                >
                <a
                  href="https://health.nt.gov.au/professionals/medicines-and-poisons-control2/therapeutic-medicines-containing-cannabinoids-medicinal-cannabis"
                  target="blank_"
                  >NT Department of Health</a
                >
                <a
                  href="https://www.health.tas.gov.au/psbtas/medicinal_cannabis"
                  target="blank_"
                  >Tasmanian Department of Health</a
                >
              </div>
            </div>
          </div>
          <div id="regulation-image" class="grid-section">
            <img
              src="img/landing-images/cannabis-australia.jpg"
              alt="placeholder"
            />
          </div>
          <!-- Eligibility Info -->
          <div id="eligibility-image" class="grid-section">
            <img
              src="img/landing-images/eligibility-photo.jpg"
              alt="placeholder"
            />
          </div>
          <div id="eligibility-text" class="grid-section">
            <div class="grid-section-text">
              <h1>Eligibility Information</h1>
              <p>
                Please visit your doctor to determine your eligibility to
                purchase our products. Due to tight regulation, we are only
                allowed to distribute to prescribed patients. If you would like
                to know if you are eligible to purchase our products, please use
                the link below to speak to your current GP.
              </p>
              <!-- Visit GP Link -->
              <button
                class="grid-button"
                onclick="window.open('https://www.hotdoc.com.au/','_blank')"
              >
                Speak With Your Doctor >
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
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
    </div>
  </body>
</html>
