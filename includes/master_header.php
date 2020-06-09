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
    <link rel="stylesheet" href="assets/css/duck.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/contactform.css">
</head>

<body class="d-flex flex-column h-100">
    <header id="header">
        <nav class="navbar navbar-expand-md navbar-dark bg-warning fixed-top py-0">
            <a href="index.php" class="navbar-brand">
                <h3 class="px-0">
                    <i class="fas fa-crow"></i>duck<span class="text-danger">Village</span>
                </h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Categories<span class="sr-only ">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Popular</a>
                    </li>

                </ul>
                <input class="form-control form-control-light w-50 mr-3 rounded-pill" type="text" placeholder="Search what you are looking for..." aria-label="Search">
                <!-- <form class="form-inline my-2 my-lg-0 cover">
            <input class="form-control mr-sm-2 w-30 rounded-pill" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
        </form> -->

                <ul class="navbar-nav float-fight">

                    <li class="nav-item">
                        <a href="cart.php" class="nav-item nav-link active">Cart

                            <span class="text-white"><i class="fas fa-cart-plus fa-lg"></i></span>
                            <?php

                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<span id=\"cart_count\" class=\"text-danger\">$count</span>";
                            } else {
                                echo "<span id=\"cart_count\" class=\"text-danger\">0</span>";
                            }

                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contactform.php" class="nav-item nav-link">Contact
                            <span class="text-white"><i class="fas fa-comment-dots fa-lg"></i></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a style="cursor:pointer" class="nav-item nav-link" data-toggle = "modal" data-target="#ModalCenter">Log In
                        <span class="text-white"><i class="far fa-user fa-lg"></i></span>
                        <span class="text-primary">Admin</span> 
            </a> -->
                        <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#ModalCenter">Log in
                            <span class="text-white"><i class="far fa-user-circle fa-lg"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>