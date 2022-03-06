<?php

include('connect.php');

  try{
    
      if(isset($_POST['sign_up'])){

        if(empty($_POST['username'])){
           throw new Exception("Username cann't be empty.");
        }

        if(empty($_POST['email'])){
          throw new Exception("Email cann't be empty.");
        }

        if(empty($_POST['password'])){
           throw new Exception("Password cann't be empty.");
        }
        
        if(empty($_POST['confirm_password'])){
           throw new Exception("Password confirmation cann't be empty.");
        }

        if(strcmp($_POST['password'],$_POST['confirm_password']) == 0){
          $result = $conn->query("insert into userinfo(username,email,password) values('$_POST[username]','$_POST[email]','$_POST[password]')");
          $success_msg="Signup Successfull!";
          header('location: login.php');
        }else{
          throw new Exception("Password Mismatch");
          }
  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>K_ART</title>
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
    <div class="header">
      <!--==== Nav Bar Start ====-->
      <div class="container">
        <div class="navbar">
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
              <li><a href="index.html">Home</a></li>
              <li><a href="products.html">Products</a></li>
              <li><a href="">About</a></li>
              <li><a href="">Contact</a></li>
              <li><a href="">Account</a></li>
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

        <!-- ==== first section ==== -->
        <div class="row first-section">
          <div class="col-2">
            <h1>
              Welcome to K_ART. <br />
              Buy my art !
            </h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              <br />
              aliquam natus suscipit assumenda atque voluptatem !
            </p>
          </div>
          <div class="col-2">
            <div class="sign_up" id="sign_up-form">
              <h3>User Login</h3>

              <?php
              if(isset($success_msg)) echo $success_msg;
              if(isset($error_msg)) echo $error_msg;
              ?>

              <form method="post" action="sign_up.php">
              <fieldset>
                  <input
                    type="text"
                    autofocus
                    id="un"
                    placeholder="username"
                    required
                    autocomplete="off"
                    name="username"
                  />
                  <input
                    type="text"
                    autofocus
                    id="em"
                    placeholder="Email"
                    required
                    autocomplete="off"
                    name="email"
                  />
                  <input
                    type="password"
                    id="up"
                    placeholder="Password"
                    required
                    autocomplete="off"
                    name="password"
                  /><input
                  type="text"
                  autofocus
                  id="cup"
                  placeholder="confirm password"
                  required
                  autocomplete="off"
                  name="confirm_password"
                />
                  <input type="submit" name="sign_up" value="sign up" />
                </form>
              </fieldset>
              </form>

            </div>
            <p class=""> already have an account? <a href="login.html">Login Here </a> . </p>
            <!-- end sign_up-form -->
          </div>
        </div>
        <!-- ==== end first section ==== -->
      </div>
    </div>

    <!-- ==== footer ==== -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>dont know yet</h3>
            <div class="feather-logo">
              <img src="images/feather-logo_ccexpress.png" alt="" />
            </div>
            <p>some text, some text, some text adipisicing.</p>
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
  </body>
</html>
