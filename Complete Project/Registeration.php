<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO customers(customername, customeremail, customerpassword) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login and sign up</title>
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
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content p {
            color: red;
        }
        .navbar-collapse a:hover{
            background-color:#7f7f7f ;
            border-radius: 20px;
        }
      :root {
          --form-height: 550px;
          --form-width: 900px;
          /*  Sea Green */
          --left-color: #00a5b1;
          /*  Light Blue  */
          --right-color:#00a5b1;
        }

        body,
        html {
          width: 100%;
          height: 100%;
          margin: 0;
          font-family: "Helvetica Neue", sans-serif;
          letter-spacing: 0.5px;
        }

        .container2 {
          width: var(--form-width);
          height: var(--form-height);
          position: relative;
          margin: auto;
          box-shadow: 2px 10px 40px rgba(22, 20, 19, 0.4);
          border-radius: 10px;
          margin-top: 50px;
          padding:0px;
        }
        /* 
        ----------------------
              Overlay
        ----------------------
        */
        .overlay {
          width: 100%;
          height: 100%;
          position: absolute;
          z-index: 100;
          background-image: linear-gradient(
            to right,
            var(--left-color),
            var(--right-color)
          );
          border-radius: 10px;
          color: white;
          clip: rect(0, 385px, var(--form-height), 0);
        }

        .open-sign-up {
          animation: slideleft 1s linear forwards;
        }

        .open-sign-in {
          animation: slideright 1s linear forwards;
        }

        .overlay .sign-in,
        .overlay .sign-up {
          /*  Width is 385px - padding  */
          --padding: 50px;
          width: calc(483px - var(--padding) * 2);
          height: 100%;
          display: flex;
          justify-content: center;
          flex-direction: column;
          align-items: center;
          padding: 0px var(--padding);
          text-align: center;
        }

        .overlay .sign-in {
          float: left;
        }

        .overlay-text-left-animation {
          animation: text-slide-in-left 1s linear;
        }
        .overlay-text-left-animation-out {
          animation: text-slide-out-left 1s linear;
        }

        .overlay .sign-up {
          float: right;
        }

        .overlay-text-right-animation {
          animation: text-slide-in-right 1s linear;
        }

        .overlay-text-right-animation-out {
          animation: text-slide-out-right 1s linear;
        }

        .overlay h1 {
          margin: 0px 5px;
          font-size: 2.1rem;
        }

        .overlay p {
          margin: 20px 0px 30px;
          font-weight: 200;
        }
        /* 
        ------------------------
              Buttons
        ------------------------
        */
        .switch-button,
        .control-button {
          cursor: pointer;
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 140px;
          height: 40px;
          font-size: 14px;
          text-transform: uppercase;
          background: none;
          border-radius: 20px;
          color: white;
        }

        .switch-button {
          border: 2px solid;
        }

        .control-button {
          border: none;
          margin-top: 15px;
        }

        .switch-button:focus,
        .control-button:focus {
          outline: none;
        }

        .control-button.up {
          background-color: var(--left-color);
        }

        .control-button.in {
          background-color: var(--right-color);
        }

        /* 
        --------------------------
              Forms
        --------------------------
        */
        .form {
          width: 100%;
          height: 100%;
          position: absolute;
          border-radius: 10px;
        }

        .form .sign-in,
        .form .sign-up {
          --padding: 50px;
          position: absolute;
          /*  Width is 100% - 385px - padding  */
          width: calc(var(--form-width) - 385px - var(--padding) * 2);
          height: 100%;
          display: flex;
          justify-content: center;
          flex-direction: column;
          align-items: center;
          padding: 0px var(--padding);
          text-align: center;
        }

        /* Sign in is initially not displayed */
        .form .sign-in {
          display: none;
        }

        .form .sign-in {
          left: 0;
        }

        .form .sign-up {
          right: 0;
        }

        .form-right-slide-in {
          animation: form-slide-in-right 1s;
        }

        .form-right-slide-out {
          animation: form-slide-out-right 1s;
        }

        .form-left-slide-in {
          animation: form-slide-in-left 1s;
        }

        .form-left-slide-out {
          animation: form-slide-out-left 1s;
        }

        .form .sign-in h1 {
          color: var(--right-color);
          margin: 0;
        }

        .form .sign-up h1 {
          color: var(--left-color);
          margin: 0;
        }

        .social-media-buttons {
          display: flex;
          justify-content: center;
          width: 100%;
          margin: 15px;
        }

        .social-media-buttons .icon {
          width: 40px;
          height: 40px;
          border: 1px solid #dadada;
          border-radius: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          margin: 10px 7px;
        }

        .small {
          font-size: 13px;
          color: grey;
          font-weight: 200;
          margin: 5px;
        }

        .social-media-buttons .icon svg {
          width: 25px;
          height: 25px;
        }

        #sign-in-form input,
        #sign-up-form input {
          margin: 12px;
          font-size: 14px;
          padding: 15px;
          width: 260px;
          font-weight: 300;
          border: none;
          background-color: #e4e4e494;
          font-family: "Helvetica Neue", sans-serif;
          letter-spacing: 1.5px;
          padding-left: 20px;
        }

        #sign-in-form input::placeholder {
          letter-spacing: 1px;
        }

        .forgot-password {
          font-size: 12px;
          display: inline-block;
          border-bottom: 2px solid #efebeb;
          padding-bottom: 3px;
        }

        .forgot-password:hover {
          cursor: pointer;
        }

        /* 
        ---------------------------
            Animation
        ---------------------------
        */
        @keyframes slideright {
          0% {
            clip: rect(0, 385px, var(--form-height), 0);
          }
          30% {
            clip: rect(0, 480px, var(--form-height), 0);
          }
          /*  we want the width to be slightly larger here  */
          50% {
            clip: rect(
              0px,
              calc(var(--form-width) / 2 + 480px / 2),
              var(--form-height),
              calc(var(--form-width) / 2 - 480px / 2)
            );
          }
          80% {
            clip: rect(
              0px,
              var(--form-width),
              var(--form-height),
              calc(var(--form-width) - 480px)
            );
          }
          100% {
            clip: rect(
              0px,
              var(--form-width),
              var(--form-height),
              calc(var(--form-width) - 385px)
            );
          }
        }

        @keyframes slideleft {
          100% {
            clip: rect(0, 385px, var(--form-height), 0);
          }
          70% {
            clip: rect(0, 480px, var(--form-height), 0);
          }
          /*  we want the width to be slightly larger here  */
          50% {
            clip: rect(
              0px,
              calc(var(--form-width) / 2 + 480px / 2),
              var(--form-height),
              calc(var(--form-width) / 2 - 480px / 2)
            );
          }
          30% {
            clip: rect(
              0px,
              var(--form-width),
              var(--form-height),
              calc(var(--form-width) - 480px)
            );
          }
          0% {
            clip: rect(
              0px,
              var(--form-width),
              var(--form-height),
              calc(var(--form-width) - 385px)
            );
          }
        }

        @keyframes text-slide-in-left {
          0% {
            padding-left: 20px;
          }
          100% {
            padding-left: 50px;
          }
        }

        @keyframes text-slide-in-right {
          0% {
            padding-right: 20px;
          }
          100% {
            padding-right: 50px;
          }
        }

        @keyframes text-slide-out-left {
          0% {
            padding-left: 50px;
          }
          100% {
            padding-left: 20px;
          }
        }

        @keyframes text-slide-out-right {
          0% {
            padding-right: 50px;
          }
          100% {
            padding-right: 20px;
          }
        }

        @keyframes form-slide-in-right {
          0% {
            padding-right: 100px;
          }
          100% {
            padding-right: 50px;
          }
        }

        @keyframes form-slide-in-left {
          0% {
            padding-left: 100px;
          }
          100% {
            padding-left: 50px;
          }
        }

        @keyframes form-slide-out-right {
          0% {
            padding-right: 50px;
          }
          100% {
            padding-right: 80px;
          }
        }

        @keyframes form-slide-out-left {
          0% {
            padding-left: 50px;
          }
          100% {
            padding-left: 80px;
          }
        }

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
                  <a class="nav-link" href="index.php?page=home">Home
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
                <li class="nav-item">
                  <a class="nav-link" href="Contact.php?page=Contact">Contact
                    <span class="sr-only ">(current)</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
    </nav>


    <div class="container2">
      <div class="overlay" id="overlay">
        <div class="sign-in" id="sign-in">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="switch-button" id="slide-right-button">Sign In</button>
        </div>
        <div class="sign-up" id="sign-up">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start a journey with us</p>
          <button class="switch-button" id="slide-left-button">Sign Up</button>
        </div>
      </div>
      <div class="form">
        <div class="sign-in" id="sign-in-info">
          <h1>Sign In</h1>
          <div class="social-media-buttons">
            <div class="icon">
              <svg viewBox="0 0 24 24">
                <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
            </svg>
            </div>
            <div class="icon">
            <svg viewBox="0 0 24 24">
                <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
            </svg>
            </div>
            <div class="icon">
            <svg viewBox="0 0 24 24">
              <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
            </svg>
            </div>
          </div>
          <p class="small">or use your email account:</p>
          <form id="sign-in-form" method="post" action="login.php">      
            <input type="email" name="email" placeholder="Email" required/>
            <input type="password" name="password"  placeholder="Password" required/>
            <p class="forgot-password">Forgot your password?</p>
            <button class="control-button in">Sign In</button>
          </form>
        </div>
        <div class="sign-up" id="sign-up-info">
          <h1>Create Account</h1>
          <div class="social-media-buttons">
            <div class="icon">
              <svg viewBox="0 0 24 24">
                <path fill="#000000" d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
            </svg>
            </div>
            <div class="icon">
            <svg viewBox="0 0 24 24">
                <path fill="#000000" d="M23,11H21V9H19V11H17V13H19V15H21V13H23M8,11V13.4H12C11.8,14.4 10.8,16.4 8,16.4C5.6,16.4 3.7,14.4 3.7,12C3.7,9.6 5.6,7.6 8,7.6C9.4,7.6 10.3,8.2 10.8,8.7L12.7,6.9C11.5,5.7 9.9,5 8,5C4.1,5 1,8.1 1,12C1,15.9 4.1,19 8,19C12,19 14.7,16.2 14.7,12.2C14.7,11.7 14.7,11.4 14.6,11H8Z" />
            </svg>
            </div>
            <div class="icon">
            <svg viewBox="0 0 24 24">
              <path fill="#000000" d="M21,21H17V14.25C17,13.19 15.81,12.31 14.75,12.31C13.69,12.31 13,13.19 13,14.25V21H9V9H13V11C13.66,9.93 15.36,9.24 16.5,9.24C19,9.24 21,11.28 21,13.75V21M7,21H3V9H7V21M5,3A2,2 0 0,1 7,5A2,2 0 0,1 5,7A2,2 0 0,1 3,5A2,2 0 0,1 5,3Z" />
            </svg>
            </div>
          </div>
          <p class="small">or use your email for registration:</p>
          <form id="sign-up-form" method="post" action="Registeration.php">
            <input type="text"  name="name"  placeholder="Name" required/>
            <input type="email"  name="email" id="email"  placeholder="Email" required/>
            <span id="emailError" class="error"></span>
            <input type="password"  name="password" id="password"  placeholder="Password" required/>
            <button class="control-button up">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
    
        <!-- Modal HTML -->
        <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Invalid username or password!</p>
        </div>
    </div>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

    <script>
       document.getElementById('sign-up-form').addEventListener('submit', function(event) {
            const emailInput = document.getElementById('email').value;
            const emailError = document.getElementById('emailError');
            const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

            if (!emailPattern.test(emailInput)) {
                event.preventDefault();
                emailError.textContent = 'Invalid email. Must contain "@" and end with "gmail.com".';
            } else {
                emailError.textContent = '';
            }
        });
              window.onload = function() {
            if (window.location.search.indexOf('error=1') !== -1) {
                var modal = document.getElementById("errorModal");
                var span = document.getElementsByClassName("close")[0];
                modal.style.display = "block";
                span.onclick = function() {
                    modal.style.display = "none";
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            }
        }
                var overlay = document.getElementById("overlay");

          // Buttons to 'switch' the page
          var openSignUpButton = document.getElementById("slide-left-button");
          var openSignInButton = document.getElementById("slide-right-button");

          // The sidebars
          var leftText = document.getElementById("sign-in");
          var rightText = document.getElementById("sign-up");

          // The forms
          var accountForm = document.getElementById("sign-in-info")
          var signinForm = document.getElementById("sign-up-info");

          // Open the Sign Up page
          openSignUp = () =>{
            // Remove classes so that animations can restart on the next 'switch'
            leftText.classList.remove("overlay-text-left-animation-out");
            overlay.classList.remove("open-sign-in");
            rightText.classList.remove("overlay-text-right-animation");
            // Add classes for animations
            accountForm.className += " form-left-slide-out"
            rightText.className += " overlay-text-right-animation-out";
            overlay.className += " open-sign-up";
            leftText.className += " overlay-text-left-animation";
            // hide the sign up form once it is out of view
            setTimeout(function(){
              accountForm.classList.remove("form-left-slide-in");
              accountForm.style.display = "none";
              accountForm.classList.remove("form-left-slide-out");
            }, 700);
            // display the sign in form once the overlay begins moving right
            setTimeout(function(){
              signinForm.style.display = "flex";
              signinForm.classList += " form-right-slide-in";
            }, 200);
          }

          // Open the Sign In page
          openSignIn = () =>{
            // Remove classes so that animations can restart on the next 'switch'
            leftText.classList.remove("overlay-text-left-animation");
            overlay.classList.remove("open-sign-up");
            rightText.classList.remove("overlay-text-right-animation-out");
            // Add classes for animations
            signinForm.classList += " form-right-slide-out";
            leftText.className += " overlay-text-left-animation-out";
            overlay.className += " open-sign-in";
            rightText.className += " overlay-text-right-animation";
            // hide the sign in form once it is out of view
            setTimeout(function(){
              signinForm.classList.remove("form-right-slide-in")
              signinForm.style.display = "none";
              signinForm.classList.remove("form-right-slide-out")
            },700);
            // display the sign up form once the overlay begins moving left
            setTimeout(function(){
              accountForm.style.display = "flex";
              accountForm.classList += " form-left-slide-in";
            },200);
          }

          // When a 'switch' button is pressed, switch page
          openSignUpButton.addEventListener("click", openSignUp, false);
          openSignInButton.addEventListener("click", openSignIn, false);
    </script>
</body>
</html>