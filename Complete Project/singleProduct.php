<?php
include 'db.php';

$product_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM product WHERE Productid = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product</title>
</head>

<body>
   <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
          <div class="container">
            <a class="navbar-brand" href="project.html"><b>E-Commerce</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
                        <!-- search bar -->
             <div id="custom-search-input">
               <div class="input-group col-md-12">
                <input type="text" class="  search-query form-control" placeholder="Search" />
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                        <span class=" glyphicon glyphicon-search">&#128269;</span>
                    </button></span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="index.php?page=home">Home
                      </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php?page=about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Category.php?page=Category">Categories</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Product.php?page=Product">Products</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="Contact.php?page=Contact">Contact
                    <span class="sr-only ">(current)</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>



    <div class="container2 mt-5 mb-5">
        <div class="row d-flex justify-content-center" style="width: 100%;">
            <div class="col-md-10">
                <div class="card"  style="box-shadow: 5px 5px 5px rgb(20, 20, 20); margin-top: 40px;" >
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="<?php echo $product['Image']; ?>" width="250" /> </div>
                                <div class="thumbnail text-center"> <img onclick="change_image(this)" src="<?php echo $product['Image']; ?>" width="70"> <img onclick="change_image(this)" src="<?php echo $product['Image']; ?>" width="70"> </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="position: relative;" >
                            <div class="product p-4" style="height: 100%;right: 0px; padding-bottom: 20px;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                    <h5 class="text-uppercase"><?php echo $product['ProductName']; ?></h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">$<?php echo $product['ProductPrice']; ?></span>
                                        <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                    </div>
                                </div>
                                <p class="about"><?php echo $product['ProductDescription']; ?></p>
                                <div class="sizes mt-5">
                                    <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                                </div>
                                <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script>
    function change_image(image){

                 var container = document.getElementById("main-image");

                container.src = image.src;
    }
            document.addEventListener("DOMContentLoaded", function(event) {
            });
 </script>

    <style>
         /* search bar */
    #custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }
 
    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;

    }
 
    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    } */
    /* end of search bar  */

    .navbar-collapse a:hover{
        background-color:#7f7f7f ;
        border-radius: 20px;
        text-decoration: none;
    }
     body{background-color: #5f5f5f;}
     .card{border:none}
     .product{background-color: #eee}
     .brand{font-size: 13px}
     .act-price{color:red;font-weight: 700}
     .dis-price{text-decoration: line-through}
     .about{font-size: 14px}
     .color{margin-bottom:10px}
     label.radio{cursor: pointer}
     label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}
     label.radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}
     label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}
     .btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}
     .btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}
     .btn-danger:focus{box-shadow: none}
     .cart i{margin-right: 10px} 
     @media screen and (max-width:770px){
        .product{
            position:static;
        }
    }
     </style>
</body>
</html>