$(function () {

    $(".form-control").on('focus', function () {

        $(this).parents(".form-group").addClass('focused');

    });

    $(".form-control").on('blur', function () {

        $(this).parents(".form-group").removeClass('focused');

    });

});
// Run wow.js
new WOW().init();
// Global
var products = [];
var cartItems = [];
var cart_n = document.getElementById("cart_n");
// Divs
var fruitDIV = document.getElementById("fruitDIV");
var juiceDIV = document.getElementById("juiceDIV");
var salaDIV = document.getElementById("salaDIV");
// Information
var FRUIT = [
    { name: 'Apple', price: 1 },
    { name: 'Orange', price: 1 },
    { name: 'Cherry', price: 1 },
    { name: 'Strawberry', price: 1 },
    { name: 'Kiwi', price: 1 },
    { name: 'Banana', price: 1 }
];
var JUICE = [
    { name: 'Juice #1', price: 10 },
    { name: 'Juice #2', price: 11 },
    { name: 'Juice #3', price: 12 }
];
var SALAD = [
    { name: 'Salad #1', price: 11 },
    { name: 'Salad #2', price: 12 },
    { name: 'Salad #2', price: 13 }
];
// HTML
function HTMLfruitProduct(con) {
    let URL = `img/fruits/fruits ${con}.jpeg`;
    let btn = `btnFruits ${con}`;

    return `
        <div class = "col-md-4" wow zoomIn data-wow-duration = "10s" data-wow-offset = "240">
            <div class = "card mb-4 shadow-sm">
                <img class = "card-img-top" style = "height:16rem;" src = "${URL}" alt = "Card
                image cap">
                    <div class = card-body>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i> 
                        <p class = "card-text">${FRUIT[con - 1], name}.00</p>
                        <p class = "card-text">Price: $${FRUIT[con - 1], price}.00</p>
                    
                        <div class = "d-flex justify-content-between align-items-center">
                            <div class = "btn-group">
                                <button type = "button" onclick = "cart2('${FRUIT[con - 1], name}'),'${FRUIT[con - 1].price}','${URL}','${con}}', '${btn}')"
                                class = "btn btn-sms btn-outline-secondary">
                                    <a style = "color:inherit;" href="cart.php">Add to cart</a>
                                </button>
                                <div class = "btn-group">
                                <button id="${btn}" type = "button" onclick = "cart2('${FRUIT[con - 1], name}'),'${FRUIT[con - 1].price}','${URL}','${con}}', '${btn}')"
                                class = "btn btn-sms btn-outline-secondary">
                                    <a style = "color:inherit;" href="#">Add to cart</a>
                                </button>
                            </div> 
                        <small class = "text-muted"> Free Shipping</small>
                    </div>
                </div>
            </div>
        </div>
    `;

}

function HTMLfruitProduct(con) {
    let URL = `img/juice/juice ${con}.jpeg`;
    let btn = `btnFruits ${con}`;

    return `
            <div class = "col-md-4" wow zoomIn data-wow-duration = "10s" data-wow-offset = "240">
                <div class = "card mb-4 shadow-sm">
                    <img class = "card-img-top" style = "height:16rem;" src = "${URL}" alt = "Card
                    image cap">
                        <div class = card-body>
                            <i style = "color:orange;" class = "fa fa-star"></i>
                            <i style = "color:orange;" class = "fa fa-star"></i>
                            <i style = "color:orange;" class = "fa fa-star"></i>
                            <i style = "color:orange;" class = "fa fa-star"></i>
                            <i style = "color:orange;" class = "fa fa-star"></i> 
                            <p class = "card-text">${JUICE[con - 1], name}.00</p>
                            <p class = "card-text">Price: $${JUICE[con - 1], price}.00</p>
                        
                            <div class = "d-flex justify-content-between align-items-center">
                                <div class = "btn-group">
                                    <button type = "button" onclick = "cart2('${JUICE[con - 1], name}'),
                                    '${JUICE[con - 1].price}','${URL}','${con}}', '${btn}')"
                                    class = "btn btn-sms btn-outline-secondary">
                                        <a style = "color:inherit;" href="cart.php">Add to cart</a>
                                    </button>
                                    <button id="${btn}" type = "button" onclick = "cart2('${JUICE[con - 1], name}'),
                                    '${JUICE[con - 1].price}','${URL}','${con}}', '${btn}')"
                                    class = "btn btn-sms btn-outline-secondary">
                                        <a style = "color:inherit;" href="#">Add to cart</a>
                                    </button>
                                </div> 
                            <small class = "text-muted"> Free Shipping</small>
                        </div>
                    </div>
                </div>
            </div>
        `;
}

function HTMLfruitProduct(con) {
    let URL = `img/salad/salad ${con}.jpeg`;
    let btn = `btnFruits ${con}`;

    return `
        <div class = "col-md-4" wow zoomIn data-wow-duration = "10s" data-wow-offset = "240">
            <div class = "card mb-4 shadow-sm">
                <img class = "card-img-top" style = "height:16rem;" src = "${URL}" alt = "Card
                image cap">
                    <div class = card-body>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i>
                        <i style = "color:orange;" class = "fa fa-star"></i> 
                        <p class = "card-text">${SALAD[con - 1], name}.00</p>
                        <p class = "card-text">Price: $${SALAD[con - 1], price}.00</p>
                    
                        <div class = "d-flex justify-content-between align-items-center">
                            <div class = "btn-group">
                                <button type = "button" onclick = "cart2('${SALAD[con - 1], name}'),
                                '${SALAD[con - 1].price}','${URL}','${con}}', '${btn}')"
                                class = "btn btn-sms btn-outline-secondary">
                                    <a style = "color:inherit;" href="cart.php">Add to cart</a>
                                </button>
                                <button id="${btn}" type = "button" onclick = "cart2('${SALAD[con - 1], name}'),
                                '${SALAD[con - 1].price}','${URL}','${con}}', '${btn}')"
                                class = "btn btn-sms btn-outline-secondary">
                                    <a style = "color:inherit;">Add to cart</a>
                                </button>
                            </div> 
                        <small class = "text-muted"> Free Shipping</small>
                    </div>
                </div>
            </div>
        </div>
    `;
}
// ANIMATION
function animation() {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1000
    });
    toast({
        type: 'success',
        title: 'Added to shopping cart'
    });
}

// CART FUNCTIONS
function cart(name, price, url, con, btncart) {
    var item = {
        name: name,
        price,
        price: price,
        url: url
    }
    cartItems.push(item);
    let strage = jSON.parse(localStorage.getItem("cart"));
    if (storage === null) {
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(products));

    } else {
        products = JSON.parse(localStorage.getItem(cart));
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(product));
    }
    product = JSON.parse(localStorage.getItem("cart"));
    cart_n.innerHTML = `[${products.length}]`;
    document.getElementById("btncart").style.display = "none";
    animation();

}

function cart2(name, price, url, con, btncart) {
    var item = {
        name=name,
        price=price,
        url: url
    }
    cartItems.push(item);
    let storage = JSON.parse(localStorage.getItem("cart"));
    if (storage === null) {
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(products));

    } else {
        products = JSON.parse(localStorage.getItem(cart));
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(product));
    }
    product = JSON.parse(localStorage.getItem("cart"));
    cart_n.innerHTML = `[${products.length}]`;
    document.getElementById("btncart").style.display = "none";
    animation();
}
// RENDER
function render() {
    for (let index = 1; index <= 6; index++) {
        fruitDIV.innerHTML += `${HTMLfruitProduct(index)}`;
    }
    for (let index = 1; index <= 3; index++) {
        juiceDIV.innerHTML += `${HTMLjuiceProduct(index)}`;
        saladDIV.innerHTML += `${HTMLsaladProduct(index)}`;

    }
    if (localStorage.getItem("cart") === null) {

    } else {
        products = JSON.parse(localStorage.getItem("cart"));
        cart_n.innerHTML = `[${products.length}]`;

    }
    // Login

    document.getElementById("formA").addEventListener("submit", (e) => {
        e.preventDefault();
        var userLogin = document.getElementById("usera");
        var passLogin = document.getElementById("passworda");
        if (userLogin.value === "ADMIN" && passLogin === "123") {
            swal({
                title: 'Welcome',
                html: 'Access granted',
                type: 'success'
            });
            setTimeout(() => {
                loadPage();
            }, 300);
        } else {
            swal({
                title: 'Error',
                html: 'Access denied',
                type: 'error'
            });
        }
        function loadPage() {
            window.location.href = "./admin./admin.php";
        }
    });


//