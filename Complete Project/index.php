
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Home</title>
    <style>
        .carousel-item {
        height: 100vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }
        .lnr {
        display: inline-block;
        fill: currentColor;
        width: 1em;
        height: 1em;
        vertical-align: -0.05em;
        stroke-width: 1;
        }

        .services-icon {
        margin-bottom: 20px;
        font-size: 30px;
        }
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


    </style>
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
                <li class="nav-item active">
                  <a class="nav-link" href="index.php?page=index">Home
                      </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php?page=about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Category.php?page=Category">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Product.php?page=Product">Products</a>
                  </li>
                <li class="nav-item ">
                  <a class="nav-link" href="Contact.php?page=Contact">Contact
                    <span class="sr-only ">(current)</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
    </nav>      


     
        <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('https://www.wordstream.com/wp-content/uploads/2021/07/fashion-marketing-tips.jpg')">
            <div class="carousel-caption d-none d-md-block">
                <p class="display-4"><a style="background-color: #00a5b1; padding:10px 50px;font-weight:500;color:white;font-size:25px;border-radius:20px;text-align:center; text-decoration:none; " href="Registeration.php?page=Registeration">Log In</a></p>
                <p class="lead"></p>
              </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://cdn.shopify.com/s/files/1/0070/7032/files/fashion_20marketing.png?v=1710527056')">
            <div class="carousel-caption d-none d-md-block">
                <p class="display-4"><a style="background-color: #00a5b1; padding:10px 50px;font-weight:500;color:white;font-size:25px;border-radius:20px;text-align:center; text-decoration:none; " href="Registeration.php?page=Registeration">Log In</a></p>
                <p class="lead"></p>
              </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://www.incrediwire.com/wp-content/uploads/2022/10/3.png')">
            <div class="carousel-caption d-none d-md-block">
                <p class="display-4"><a style="background-color: #00a5b1; padding:10px 50px;font-weight:500;color:white;font-size:25px;border-radius:20px;text-align:center; text-decoration:none; " href="Registeration.php?page=Registeration">Log In</a></p>
                <p class="lead"></p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
      </header>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    <style>
        .navbar-collapse a:hover{
            background-color:#7f7f7f ;
            border-radius: 20px;
        }
    </style>
  </body>
</html>