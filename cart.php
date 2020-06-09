<?php
session_start();
require_once ("php/CreateDb.php");
require_once ("php/component.php");

$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
    // to check if the product id is corrected
    // print_r($_GET['id]);
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
            //   echo '<div class="alert alert-success alert-dismissible">
            //             <button type="button" class="close" data-dismiss="alert">&times;</button>
            //             <strong>Product has been removed from your cart</strong> Indicates a successful or positive action.
            //          </div>';
            echo "<script>alert('Product has been removed from your cart!')</script>";
            echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
?>

<?php require_once('includes/master_header.php'); ?>
<!--Body starts here-->
<div class="container-fluid">
    <div class="row ml-3 mr-3 mt-5">
        <div class="col-md-8 order-md-1 bg-white mt-4 border rounded">
            <div class="shopping-cart pt-4">
                <h6 class="font-weight-bold">My Shopping Cart</h6>
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
                        echo '<h6 class="alert alert-success text-muted">Your shopping cart is empty now. Please, add some items inside your cart to continue.</h6>';
                    }

                ?>
            </div>   
        </div>
        <!--checkout button-->

        <!-- <div class="col-md-8 order-md-3 mt-4">
            <a class="btn btn-warning btn-block text-white" href="#" role="button">Continue to checkout</a>    
        </div> -->

        <!--end checkout button-->

        <div class="col-md-3 order-md-2 offset-sm-1 border rounded mt-4 bg-white h-25">
        
            <div class="price-info pt-4">
                <h6> <span class="font-weight-bold"># Product</span></h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Subtotal ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                            
                        ?>
                        <h6>Discount</h6>
                        <h6>Free shipping</h6>
                        <h6>VAT</h6>
                        <hr>
                        <h6 class="font-weight-bold">Total amount</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center">$<?php echo $total;?></h6>
                        <h6 class="text-success text-center">25%</h6>
                        <h6 class="text-warning text-center">-</h6>
                        <h6 class="text-warning text-center">FREE</h6>
                        <hr>
                        <h6 class="font-weight-bold text-center">$<?php
                            echo $total;
                            ?>
                        </h6>     
                    </div>     
                </div>
                <a class="btn btn-warning btn-block text-white mb-4 mt-3" href="checkout.php" role="button">Continue to checkout</a>
            </div>                 
        </div>                  
    </div>
    </div>
    <div class="container-fluid py-5 mr-3 ml-3">
        <!-- <h6>Hello World</h6> -->
    </div>
</div><!--end of container-fluid-->

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> -->
<!--Modal-->
  <?php require_once("includes/modal.php"); ?>
<!--end of old modal-->
<!--footer-->
<?php require_once ("includes/footer.php"); ?>
