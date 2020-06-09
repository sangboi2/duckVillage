<?php 
<div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/rubberduck1.jpg" alt="image" class="img-fluid card.img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Product1</h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                            <p class="p card-text">
                                SOme quick example text to build on the card
                            </p>
                            <h5>
                                <small><s class="text-secondary">$8</s></small>
                                <span class="price">$5</span>
                            </h5>
                            <button type="submit" class="btn btn-primary" name="add">Add to Shopping Cart <i class="fas fa-shopping-cart"></i> </button>
                        </div>
                    </div>
                </form>
                
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
            
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
            
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
            
            </div>



INSERT INTO `producttb`(`product_name`, `product_price`, `product_image`) VALUES 
('Duck One', 414.99, './upload/rubberduck1.jpg'),
('Duck Two', 179.99,'./upload/rubberduck2.jpg'),
('Duck Three', 79.99, './upload/rubberduck3.jpg'),
('Duck Four', 439.99, './upload/rubberduck4.jpg');

// Img box tha can be put component function
<img src=\"$productimg\" alt=\"image\" class=\"img-fluid card-img-top \">




<div class="container">
        <div class="row justify-content-md-center text-center py-5">
        <!--Grid layout-->            
    
            <?php 
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
        </div>
    </div>
?>





<!doctype html>
<html lang="en">
  <head>
  </head>
  <body class="bg-light">
    <div class="container-fluid">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row ml-3 mr-3">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-info badge-pill"><?php echo $count ?></span>
      </h4>
      <hr>
      <ul class="list-group mb-3 ">
    
      <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
          <div>
            <h6 class=" my-0"><strong>#Product</strong> </h6>
          </div>
          <span class="text-muted"> <strong>Price</strong> </span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
          <?php
                if (isset($_SESSION['cart'])){
                    $count  = count($_SESSION['cart']);
                         
                        echo "<h6 my-0>$count Items </h6>";
                       
                    }else{
                        echo "<h6>Price (0 items)</h6>";
                        
                        }
                ?>
            <!--<h6 class="my-0">Product name</h6>-->
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">
              
            <h6>$<?php echo $total; ?></h6>
            </span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6>VAT AMOUNT</h6>
            <!--<h6 class="my-0">Second product</h6>-->
            <small class="text-muted">Brief description</small>
          </div>
          <h6 class="text-success">FREE</h6>
          <!--<span class="text-muted">$8</span>-->
        </li>
        
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Discount</h6>
            <small>Membership discount</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span><h6>Total (USD)</h6></span>
            <strong>$<?php echo $total;?></strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Enter Discount Code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-info">Redeem</button>
          </div>
          
        </div>
       
      </form>
      <hr>
      <button class="btn btn-info btn-lg btn-block" type="submit">Continue to checkout</button>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <hr>
      
      <?php

            $total = 0;
                if (isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'], 'product_id');

                    $result = $db->getData();
                    while ($row = mysqli_fetch_assoc($result)){
                        foreach ($product_id as $id){
                            if ($row['id'] == $id){
                                cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                $total = $total + (int)$row['product_price'];
                            }
                        }
                    }
                }else{
                    echo "<h5>Cart is Empty</h5>";
                }

            ?>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>


//header

<!-- <header  id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="index.php" class="navbar-brand mr-0">
            <h3 class="px-0">
            <i class="fas fa-crow 5x"></i>duckVillage
            </h3>
        </a>
        <a class="nav-item nav-link active" href="#">About <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>

        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-0 cart">
                    <i class="fas fa-cart-plus"></i>
                    
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-danger bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-danger bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header> -->



// Master_header.php

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!--FOnt Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="duck.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<header id="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-info fixed-top">
    <a href="index.php" class="navbar-brand">
            <h3 class="px-0">
            <i class="fas fa-crow 5x"></i>duckVillage
            </h3>
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">About <span class="sr-only ">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
            </li>
            
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 w-30" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        
                <a href="cart.php" class="nav-item nav-link active">
                  <h5 class="px-0 cart text-white">Your Cart 
                    <span class="text-white" ><i class="fas fa-cart-plus fa-lg"></i></span> 
                    
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-white bg-dark\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-white bg-light\">0</span>";
                        }

                        ?>
                     </h5> 
                </a>
            


///////////////////////


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!--FOnt Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--CUSTOM CSS-->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php require_once ("php/header.php"); ?>

    <div class="container py-5">
        
        <div class="row justify-content-md-center text-center mt-5">
        <!--Grid layout-->            
    
            <?php 
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
        </div>
        
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <!--Custom-->
  <script src="js/custom.js" ></script>


</body>
</html>


// Origin Right side menu

<a href="cart.php" class="nav-item nav-link active">
<h6 class="px-0 cart"><span style="color:#5A5A5A;">Your Cart</span> 
  <span class="text-white"><i class="fas fa-cart-plus fa-lg"></i></span> 
  
      <?php

      if (isset($_SESSION['cart'])){
          $count = count($_SESSION['cart']);
          echo "<span id=\"cart_count\" class=\"text-danger\">$count</span>";
      }else{
          echo "<span id=\"cart_count\" class=\"text-danger\">0</span>";
      }

      ?> 
   </h6> 
</a>
<a href="#" class="nav-item nav-link">
<h6 class="user" ><span style="color:#5A5A5A;">Log in</span> 
  <span class="text-white"><i class="far fa-user"></i></span>
</h6>
   
</a>