<?php 
function component($productname, $productprice, $productimg, $productid){
    $element = "

    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card mb-4 shadow-sm\" >
                        <div>

                            <img src=\"$productimg\" class=\"bd-placeholder-img card-img-top \"width=\"100%\" height=\"225\" preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\"></img>
                        
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                                Donec id elit non mi porta gravida at eget metus.
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\">$8</s></small>
                                <span class=\"price\">$productprice</span>
                            </h5>
                            <button type=\"submit\" class=\"btn btn-outline-warning btn-sm mr-2 my-3\" name=\"add\">More info</button>
                            <button type=\"submit\" class=\"btn btn-warning btn-sm my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                            <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}


function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded shadow-none p-3 mb-0 bg-light\">
                        <div class=\"row bg-light\">
                            <div class=\"col-md-2 pl-0\">
                                <img src=$productimg alt=\"image\" class=\"img-fluid ml-2 mt-2\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-1\">$productname</h5>
                                    <small class=\"text-secondary\">Description: It is a brown duck of the year</small>
                                <h5 class=\"pt-1\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-outline-warning btn-sm rounded-pill\">More info</button>
                                <button type=\"submit\" class=\"btn btn-warning btn-sm rounded-pill mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    ";
    echo  $element;
}


?>