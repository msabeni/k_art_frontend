<?php

include 'connect.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])){
    header("location: index.html");
}

if (isset($_POST['btn_signup'])){
    $signupname = $_POST['username'];
    $signupemail = $_POST['email'];
    $password =md5($_POST['password']);
    $cpassword =md5($_POST['cpassword']);

    if ($password == $cpassword){
        $checkQuery = "SELECT * FROM  `user_info` where `username` ='$signupname'";
        $check = mysqli_query($connection, $checkQuery);
        $num =mysqli_num_rows($result);

        if ($num == 0){
            $regQuery = "INSERT INTO `user_info`(`id`, `username`, `email`, `password`) VALUES (NULL,'$signupname','$signupemail','$password')";
            $save = mysqli_query($connection, $regQuery);
            if ($save){
                echo "<script>alert('Registration Complete')</script>";
                $signupname="";
                $signupemail= "";
                $_POST["password"]= "";
                $_POST["cpassword"]= "";

                header("location:account.php");
            }else{
                echo "<script>alert('Whoops, Something went wrong')</script>";
            }
        }else{
            echo "<script>alert('Oops, Username already exists')</script>";
        }
    }else{
        echo "<script>alert('passwords not matched')</script>";
    }
}
if (isset($_POST['btn_login'])){

    $name = $_POST['username'];
    $pass = md5($_POST['password']);

    $s = "select * from  user_info where username ='$name' && user_password = '$pass'";

    $result = mysqli_query($connection, $s);

    $num =mysqli_num_rows($result);

    if ($num == 1){
        $_SESSION['username'] = $name;
        header('location:products.html');
    }else { 
        header('location:account.php');
}
    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Products- K_ART</title>
    <!-- ==== Main CSS ====-->
    <link rel="stylesheet" href="style.css" />
    <!-- ===== Fonts =====-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!--font awesome-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <!--==== Nav Bar Start ====-->
    <div class="container">
      <div class="navbar" id="navbar-account">
        <div class="logo">
          <img
            src="images/art_logo2_ccexpress.png"
            alt="logo"
            width="200px"
            height="200px"
          />
        </div>
        <nav>
          <ul id="MenuItems">
            <li><a href="index.php">Home</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="">About</a></li>
            <li><a href="account.php">Account</a></li>
          </ul>
        </nav>
        <a href="cart.html"
          ><img
            src="images/cart_ccexpress.png"
            alt="cart"
            width="30px"
            height="30px"
          />
        </a>
        <img
          src="images/menu-icon_ccexpress.png"
          alt="menu-icon"
          class="menu-icon"
          onclick="menutoggle()"
          width="30px"
          height="30px"
        />
      </div>
      <!-- ==== End navbar ==== -->
    </div>

    <!-- ==== account page ==== -->
    <div class="account-page">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="images/accuont_page.png" alt="" width="100%" />
          </div>
          <div class="col-2">
            <div class="form-container">
              <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="signup()">Sign up</span>
                <hr id="indicator" />
              </div>
              <form id="login-form">
                <input type="text" placeholder="username" />
                <input type="password" placeholder="password" />
                <button type="submit" name="btn_login" class="btn">Login</button>
                <a href="">forgot password</a>
              </form>
              <form id="sign_up-form">
                <input type="text" placeholder="username" name="username"/>
                <input type="email" placeholder="email" name="email" />
                <input type="password" placeholder="password" name="password" />
                <input type="password" placeholder="confirm password" name="cpassword" />
                <button type="submit" name="btn_signup" class="btn">Sign up</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ==== footer ==== -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>contact me</h3>
            <div class="feather-logo">
              <img src="images/feather-logo_ccexpress.png" alt="" />
            </div>
            <p>+254748626940</p>
          </div>
          <div class="footer-col-2">
            <img src="images/art_logo2_ccexpress.png" alt="logo" />
            <p>
              my purpose is to sell you beautiful art pieces that will transform
              the aesthetic of your spaces
            </p>
          </div>
          <!-- <div class="footer-col-3">
            <h3>quick links</h3>
            <ul>
              <li>link</li>
              <li>link</li>
              <li>link</li>
              <li>link</li>
            </ul>
          </div> -->
          <div class="footer-col-3">
            <h3>follow me</h3>
            <ul>
              <li>Facebook</li>
              <li>Instagram</li>
              <li>Twitter</li>
              <li>Youtube</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">copyright 2022- kemi</p>
      </div>
    </div>

    <!-- ==== js for toggle menu ==== -->
    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>

    <!-- ==== js for toggle form ==== -->
    <script>
      var LoginForm = document.getElementById("login-form");
      var SignupForm = document.getElementById("sign_up-form");
      var Indicator = document.getElementById("indicator");

      function signup() {
        SignupForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
      }

      function login() {
        SignupForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
      }
    </script>
  </body>
</html>
