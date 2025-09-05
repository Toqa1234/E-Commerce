<?php
include 'db.php'; // Include the database connection

// Fetch all categories
$categories_stmt = $conn->prepare("SELECT * FROM categories");
$categories_stmt->execute();
$categories_result = $categories_stmt->get_result();

// Check if a category ID is provided in the URL
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Prepare and execute the query to fetch products from the specified category
    $stmt = $conn->prepare("SELECT * FROM product WHERE categoryid = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // If no category ID is provided, set products_result to NULL
    $result = NULL;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Categories</title>
</head>
<body>
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
                <li class="nav-item active">
                  <a class="nav-link" href="Category.php?page=Category">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Product.php?page=Product">Products</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="Contact.php?page=Contact">Contact
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

<!-- categories -->

      <div class="container-fluid mt-5 mb-5" style="font-size: 20px;" >
        <div class="p-2 bg-white px-4 rounded" >
            <div class="d-flex flex-row justify-content-between align-items-center">
                <!-- <div class="d-flex flex-row align-items-center filters"><span class="ml-2">All types</span><i class="fa fa-angle-down ml-1"></i></div> -->
                    <div class="d-flex flex-row align-items-center filters mt-2">
                        <?php while ($category = $categories_result->fetch_assoc()): ?>
                        <a href="category.php?id=<?php echo $category['CategoryID']; ?>" class="category-item" onclick=activate(this) >
                            <h3 class="text-muted" style="font-size: 18px; padding-right:20px"><?php echo $category['CategoryName']; ?></h3>
                        </a>
                        <?php endwhile; ?>
                    </div>
            </div>
        </div>
    </div>
    
 

<!-- products -->
    <div class="container" id="Hats">
        <div class="row">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid2">
                            <div class="product-image2">
                                <a href="singleproduct.php?id=<?php echo $row['ProductID']; ?>">
                                    <img class="pic-1" style="object-fit: contain;"  src="<?php echo $row['Image']; ?>">
                                    <img class="pic-2" style="object-fit: contain;"  src="<?php echo $row['Image']; ?>">
                                </a>
                                <ul class="social">
                                    <li><a href="singleproduct.php?id=<?php echo $row['ProductID']; ?>" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                <a class="add-to-cart" href="">Add to cart</a>
                            </div>
                            <div class="product-content">
                                <h3 class="title" style="font-size:22px"><a href="singleproduct.php?id=<?php echo $row['ProductID']; ?>"><b><?php echo $row['ProductName']; ?></b></a></h3>
                                <span class="price" style="font-size:18px">$<?php echo $row['ProductPrice']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                 <p>No products found for this category.</p>
            <?php endif; ?>

        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>  


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

        .clicked{
            border-bottom: 2px solid blue; font-size: 20px; text-decoration: none;
        }
        .navbar-collapse a:hover{
            background-color:#7f7f7f ;
            border-radius: 20px;
        }
        /* @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap'); */
        body{background-color: #ffffff;font-family: 'Manrope', sans-serif}
        .item{border: 1px solid #eee}.p-name{font-size: 23px}
        .btn-group{height: 33px}.btn{line-height: 15px}
        .ratings i{color: red;font-size: 20px}
        .price:hover{color: #fff !important;background-color: #432b65;border-color: #432b65!important}
        .cart:hover{color: #fff !important;background-color: #432b65;border-color: #432b65!important}
        .p-image img{width: 100% !important}
        /* ////////// */
                .row{margin-top: 80px;}
        .demo{padding:45px 0}
        h3.h3{text-align:center;margin:1em;text-transform:capitalize;font-size:1.7em;}
        .product-grid2{font-family:'Open Sans',sans-serif;position:relative}
        .product-grid2 .product-image2{overflow:hidden;position:relative}
        .product-grid2 .product-image2 a{display:block}
        .product-grid2 .product-image2 img{width:100%;height:250px ; object-fit:cover}
        .product-image2 .pic-1{opacity:1;transition:all .5s}
        .product-grid2:hover .product-image2 .pic-1{opacity:0}
        .product-image2 .pic-2{width:100%;height:100%;opacity:0;position:absolute;top:0;left:0;transition:all .5s}
        .product-grid2:hover .product-image2 .pic-2{opacity:1}
        .product-grid2 .social{padding:0;margin:0;position:absolute;bottom:50px;right:25px;z-index:1}
        .product-grid2 .social li{margin:0 0 10px;display:block;transform:translateX(100px);transition:all .5s}
        .product-grid2:hover .social li{transform:translateX(0)}
        .product-grid2:hover .social li:nth-child(2){transition-delay:.15s}
        .product-grid2:hover .social li:nth-child(3){transition-delay:.25s}
        .product-grid2 .social li a{color:#505050;background-color:#fff;font-size:17px;line-height:45px;text-align:center;height:45px;width:45px;border-radius:50%;display:block;transition:all .3s ease 0s}
        .product-grid2 .social li a:hover{color:#fff;background-color:#3498db;box-shadow:0 0 10px rgba(0,0,0,.5)}
        .product-grid2 .social li a:after,.product-grid2 .social li a:before{content:attr(data-tip);color:#fff;background-color:#000;font-size:12px;line-height:22px;border-radius:3px;padding:0 5px;white-space:nowrap;opacity:0;transform:translateX(-50%);position:absolute;left:50%;top:-30px}
        .product-grid2 .social li a:after{content:'';height:15px;width:15px;border-radius:0;transform:translateX(-50%) rotate(45deg);top:-22px;z-index:-1}
        .product-grid2 .social li a:hover:after,.product-grid2 .social li a:hover:before{opacity:1}
        .product-grid2 .add-to-cart{color:#fff;background-color:#404040;font-size:15px;text-align:center;width:100%;padding:10px 0;display:block;position:absolute;left:0;bottom:-100%;transition:all .3s}
        .product-grid2 .add-to-cart:hover{background-color:#3498db;text-decoration:none}
        .product-grid2:hover .add-to-cart{bottom:0}
        .product-grid2 .product-new-label{background-color:#3498db;color:#fff;font-size:17px;padding:5px 10px;position:absolute;right:0;top:0;transition:all .3s}
        .product-grid2:hover .product-new-label{opacity:0}
        .product-grid2 .product-content{padding:20px 10px;text-align:center}
        .product-grid2 .title{font-size:17px;margin:0 0 7px}
        .product-grid2 .title a{color:#303030}
        .product-grid2 .title a:hover{color:#3498db}
        .product-grid2 .price{color:#303030;font-size:15px}
        @media screen and (max-width:990px){.product-grid2{margin-bottom:30px}
        }
   </style>
   <script>
     function activate(element) {
            // Remove 'active' class from all h3 elements
            document.querySelectorAll('.filters a').forEach(function(a) {
                a.classList.remove('clicked');
            });
            // Add 'active' class to the clicked element
            element.classList.add('clicked');
        }
   </script>
</body>
</html>