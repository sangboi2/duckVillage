<?php
session_start();
// require_once ('php/config.php');
require_once('php/CreateDb.php');
require_once('./php/component.php');

// create instance of Createdb class
$database = new CreateDb("Productdb", "Producttb");

if (isset($_POST['add'])) {
  // To see product ID
  // print_r($_POST['product_id']);

  // Create session variables
  if (isset($_SESSION['cart'])) {

    // if the session variables has already set, execute this
    $item_array_id = array_column($_SESSION['cart'], "product_id");

    if (in_array($_POST['product_id'], $item_array_id)) {
      echo "<script>alert('Product is already added in the cart..!')</script>";
      echo "<script>window.location = 'index.php'</script>";
    } else {
      // Return how many items are there in this session variable or return number of elements in array
      $count = count($_SESSION['cart']);
      $item_array = array(
        'product_id' => $_POST['product_id']
      );

      $_SESSION['cart'][$count] = $item_array;
    }
  } else {

    $item_array = array(
      'product_id' => $_POST['product_id']
    );

    // Create new session variable
    $_SESSION['cart'][0] = $item_array;
    //print_r($_SESSION['cart']);
  }
}

?>
<!--Body starts here-->

<?php require_once("includes/master_header.php"); ?>

<!--main-->
<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li style="z-index:102;" data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li style="z-index:102;" data-target="#myCarousel" data-slide-to="1"></li>
      <li style="z-index:102;" data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="imgFilter first-slide" src="assets/img/carousel/slide1.jpeg" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
        <rect width="100%" height="100%" fill="#777" /></img>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1 class="text-light font-weight-bolder">This is a wonderful world of Duck Village.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

            <div class="row">
              <p><a class="btn btn-light btn-lg mr-3" href="#" role="button">Experience the life of the duck</a></p>
              <p><a class="btn btn-warning btn-lg" href="#" role="button">Become a member</a></p>
            </div>

          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="imgFiltersecond-slide" src="assets/img/carousel/slide2.jpeg" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
        <rect width="100%" height="100%" fill="#777" /></img>
        <div class="container">
          <div class="carousel-caption">
            <h1 class="text-light font-weight-bolder">We are happy to see you in our Village.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-light btn-lg" href="#" role="button">Explore features and more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="imgFilter third-slide" src="assets/img/carousel/slide3.jpg" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
        <rect width="100%" height="100%" fill="#777" /></img>
        <div class="container">
          <div class="carousel-caption text-right">
            <h1 class="text-light font-weight-bolder">We hope you are having a good time shopping here.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-light btn-lg" href="#" role="button">Get your duck here</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <i style="font-size: 60px; margin-left:-150px; color:inherit" class="fas fa-chevron-left"></i>
      <!--defualt icon-->
      <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <i style="font-size: 60px; margin-right:-150px; color:inherit " class="fas fa-chevron-right"></i>

      <!--defualt icon-->
      <!-- <span class="carousel-control-next-icon h-50" aria-hidden="true"></span> -->
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--end of carousel-->
  <!--begins product page-->
  <div class="container-fluid pt-3">
    <!-- Hightliger-->
    <div class="alert alert-info alert-dismissible fade show py-4" role="alert">
      <h4 class="alert-heading text-center font-weight-bold text-dark text-uppercase">Seasonal special offer!</h4>
      <p class="text-center">People always like to get more for less. The buy one, get… offer allows for this. Additionally, you can use it to unload overstocked inventory in a way that helps you still have a profit margin. Especially enticing is buy one, get one free, as people have a hard time saying no to that word.</p>
      <hr>
      <p class="mb-0 text-center">We have developed Duck Tok Premium to provide with the best quality of Rubber Duck. <span><a href="#">Click here</a> to learn more about Duck Tok Premium.</span></p>

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <small><span aria-hidden="true">&times;</span></small>
      </button>
    </div>
    <!-- end of Hightliger-->

    <div class="row justify-content-md-center text-center ml-1 mr-1 mt-5">
      <!--Grid layout-->

      <!-- 
                $stmt = $con->prepare("SELECT * FROM Producttb");
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()): 
              -->

      <?php
      $result = $database->getData();
      while ($row = mysqli_fetch_assoc($result)) {
        component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
      }
      ?>
    </div>
  </div>
  <!--Modal-->
  <?php require_once("includes/modal.php"); ?>
  <!--end of old modal-->
  <!--footer-->
  <?php require_once("includes/footer.php"); ?>