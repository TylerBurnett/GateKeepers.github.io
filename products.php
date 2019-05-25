<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Chosen Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400|Raleway" rel="stylesheet">

  <!-- Font Awesome Icon Style Sheet -->
  <!-- Gervace confirmed that i can use font awesome for icon display -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="scripts\css\style.css">
  <title>Gate Keepers - Products</title>

  <?php
  include_once "queryDb.php";

  $products = getProducts($_GET["searchterm"]);

  if (isset($_GET["searchterm"]) && $_GET["searchterm"] != "") {
    $searchscope = $_GET["searchterm"];
  }
  else {
    $searchscope = "All products";
  }
   ?>
</head>

<!-- Taken from https://www.pexels.com/photo/woman-standing-while-carrying-laptop-1181354/ -->
<body class="parallax" style="background-image: url(content/images/background_products.jpg);">

  <!-- Nav -->
  <header>
    <nav class="colour-nav">
      <ul class="nav">
        <!-- Font awesome icon stuff below -->
        <li class="colour-highlight"><i id="nav-icon" class="far fa-5x fa-hdd"></i></li>
        <li><a class="colour-highlight" href="index.html">Home</a></li>
        <li><a class="colour-highlight" href="about-us.html">About us</a></li>
        <li><a class="colour-highlight" href="products.php">Products</a></li>
        <li><a class="colour-highlight" href="services.html">Services</a></li>
        <li><a class="colour-highlight" href="contact-us.html">Contact us</a></li>
      </ul>
    </nav>
  </header>
  <!-- End of Nav -->

  <!--Overlay -->
   <div id="overlay-container"></div>
  <!--End of Overlay -->

  <!-- Title Banner -->
    <div class="colour-content-1" style="background-image: url(content/images/texture-mask.png);">
      <div class="inner-content-center">
        <h1>Products</h1>
      </div>
    </div>
     <!-- End of Title Banner -->

     <!-- Main Body Content -->
      <div class="colour-content-2 top-inset-shadow">
        <div class="inner-content">
          <h2 class="top-spacing">Search</h2>
         <!-- Search Form -->
          <form action="products.php" method="get">
            <input type="text" name="searchterm" id="Search" placeholder="Product name" class="input-text input-med">
            <input type="submit" value="Search Products" class="btn btn-rounded">
          </form>
         <!-- End of Search Form -->
          <p>Searching for: <b><?php echo $searchscope; ?>.</b> </p>
         <!-- Query Table -->
          <table class="top-spacing">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Manufacturer</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($products as $product)
               {
                echo "<tr>";
                echo "<th>". $product["PRODUCTNAME"] ."</th>";
                echo "<th>". $product["DESCRIPTION"] ."</th>";
                echo "<th>". $product["MANUFACTURER"] ."</th>";
                echo "<th> $". $product["PRICE"] ."</th>";
                echo "</tr>";
              }
               ?>
            </tbody>
          </table>
         <!-- End of Query Table -->
        </div>
      </div>
      <!-- End of Main Body Content -->

      <!-- Footer -->
        <footer>
          <div class="colour-nav" style="background-image: url(content/images/texture-mask.png);">
            <div class="footer-content">
              <p>	&#9400; Gate Keepers Pty .Ltd 2019 - Gate keepers is a fictional company and does not own any copyright.<br> Created by Tyler Burnett</p>
            </div>
          </div>
        </footer>
      <!-- End of Footer -->

    </body>
    </html>
