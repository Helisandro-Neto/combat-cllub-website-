<?php
   
   include("login-sign-up-controllers/process-login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combat Club</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Catamaran:wght@600;700;800;900&family=Rubik:wght@400;500;800&display=swap"
    rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">
  <link rel="preload" as="image" href="./assets/images/hero-circle-one.png">
  <link rel="preload" as="image" href="./assets/images/hero-circle-two.png">
  <link rel="preload" as="image" href="./assets/images/heart-rate.svg">
  <link rel="preload" as="image" href="./assets/images/calories.svg">
  <style>
  
  .form-label {
      display: block;
      margin-bottom: 10px;
      color: red; /* Label color */
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
      background-color: white;
      border: 1px solid red;
      color: red; /* Text color */
    }

    .form-control::placeholder {
      color: red; /* Placeholder color */
    }

    .user-type-box {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .user-type-label {
      color: red; /* Label color */
      margin-right: 10px;
    }

    .user-type-radio {
      margin-right: 5px;
    }

    .btn-primary {
      background-color: red; /* Button background color */
      color: white; /* Button text color */
      padding: 8px 30px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-title {
      font-size: 30px;
      color: red; /* Title color */
      margin-bottom: 20px;
    }

  </style>

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo.png" class="ml-7 mr-8" width="130" height="30" alt="about banner">
        <span class="span">Combat Club</span>
      </a>
      

      <nav class="navbar ml-3" data-navbar>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-sharp" aria-hidden="true"></ion-icon>
        </button>

        <ul class="navbar-list">

          <li>
            <a href="index.php" class="navbar-link active" data-nav-link>Home</a>
          </li>


        </ul>

      </nav>
      <a href="login.php" class="btn btn-secondary">Login</a>
      <a href="register.php" class="btn btn-secondary">Join Now</a>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </button>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero bg-dark has-after has-bg-image" id="home" aria-label="hero" data-section
        style="background-image: url('./assets/images/hero-bg.png')">
        <div class="container">

          <div class="hero-content">
            <form  method="post">
              <div class="form-title"><center>Login</center></div> <!-- Added form title -->
                 <!-- User Type selection -->
               <center> <label class="user-type-label">User Type:</label> </center></br>
              <div class="user-type-box">
                
                <input type="radio" name="userType" value="student" class="user-type-radio" required>
                <span class="user-type-label">Student</span>
                <input type="radio" name="userType" value="admin" class="user-type-radio" required>
                <span class="user-type-label">Admin/Coach</span>
              </div>
              
              <label for="username" class="form-label">Username:</label>
              <input type="text" id="username" name="username" class="form-control" required>
        
              <label for="password" class="form-label">Password:</label>
              <input type="password" id="password" name="password" class="form-control" required>
        
              <button type="submit" class="btn-primary">Login</button>
            </form>
          </div>

          <div class="hero-bannr">

            <img src="./assets/images/pngimg.com - muay_thai_PNG31.png" width="660" height="753" alt="hero banner" class="w-100">

           
          </div>

        </div>
      </section>





    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="section footer-top bg-dark has-bg-image" style="background-image: url('./assets/images/footer-bg.png')">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logo.png" class="ml-7 mr-8" width="130" height="30" alt="about banner">
          
          </a>

          <p class="footer-brand-text">
            Etiam suscipit fringilla ullamcorper sed malesuada urna nec odio.
          </p>

          <div class="wrapper">

            <img src="./assets/images/footer-clock.png" width="34" height="34" loading="lazy" alt="Clock">

            <ul class="footer-brand-list">

              <li>
                <p class="footer-brand-title">Monday - Friday</p>

                <p>18h00 - 19h30</p>
              </li>



            </ul>

          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Our Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">Home</a>
          </li>

          <li>
            <a href="#" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Classes</a>
          </li>

          <li>
            <a href="#" class="footer-link">Blog</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title has-before">Contact Us</p>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="location" aria-hidden="true"></ion-icon>
            </div>

            <address class="address footer-link">
              Joule Street, Southern Industrial, Windhoek, Namibia
            </address>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="call" aria-hidden="true"></ion-icon>
            </div>

            <div>
              <a href="tel:18001213637" class="footer-link">081 235 5000</a>
            </div>
          </li>

          <li class="footer-list-item">
            <div class="icon">
              <ion-icon name="mail" aria-hidden="true"></ion-icon>
            </div>

            <div>
              <a href="mailto:info@fitlife.com" class="footer-link">combatclub.windhoek@gmail.com</a>

            </div>
          </li>

        </ul>

        <ul class="footer-list">

         

          <li>
            <ul class="social-list">

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-instagram"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 Combat Club. All Rights Reserved </a>
        </p>

        <ul class="footer-bottom-list">

                   <li>
            <a href="#" class="footer-bottom-link has-before">Terms & Condition</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up-sharp" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>