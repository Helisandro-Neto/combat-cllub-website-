<?php

include("login-sign-up-controllers/database-connection.php");
// Process the form submission if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $totalAmount = $productPrice * $quantity;
    $saleDate = date('Y-m-d H:i:s'); // Current date and time
    $cardHolderName = $_POST['name'];
    $cardNumber = $_POST['card_number'];
    $cardExpiryDate = $_POST['expiry_date'];
    $cardCVV = $_POST['cvv'];

    // Prepare and execute SQL INSERT statement
    $stmt = $conn->prepare("INSERT INTO sales (product_name, product_price, quantity, total_amount, sale_date, card_holder_name, card_number, card_expiry_date, card_cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidsisss", $productName, $productPrice, $quantity, $totalAmount, $saleDate, $cardHolderName, $cardNumber, $cardExpiryDate, $cardCVV);

    if ($stmt->execute()) {
        // Redirect to a thank you page or display a success message
        header('Location: thank-you.php');
        exit;
    } else {
        // Handle database error
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
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
  <style>
   
  /* Placeholder color */
  ::placeholder {
            color: red;
        } 
  .user-type-label {
      color: red; /* Label color */
      margin-right: 10px;
    }
  input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
        input[type="tel"],
        input[type="url"],
        textarea {
            color: red; /* Text color */
        }

        /* Buy button */
        .btn-buy {
            background-color: red; /* Button background color */
            color: white; /* Button text color */
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        /* Add your existing styles here */

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
            /* Add custom classes */
            border-radius: 5px;
            outline: none;
        }

        .form-control::placeholder {
            color: red; /* Placeholder color */
        }

        .btn-primary {
            background-color: red; /* Button background color */
            color: white; /* Button text color */
            padding: 15px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            /* Add custom classes */
            display: block;
            margin-top: 20px;
        }

        .form-title {
            font-size: 30px;
            color: red; /* Title color */
            margin-bottom: 20px;
        }

        /* Add custom classes for form elements */
        #name,
        #email,
        #quantity,
        #card_number,
        #expiry_date,
        #total_amount,
        #cvv {
            /* Add custom styles */
            padding: 12px;
            border-radius: 5px;
            border: 1px solid red;
            margin-bottom: 20px;
            width: calc(100% - 22px); /* Adjusted for padding */
            box-sizing: border-box;
            outline: none;
        }
    </style>


  </style>
  
  </style>

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      
      

      <nav class="navbar ml-3" data-navbar>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-sharp" aria-hidden="true"></ion-icon>
        </button>

        <ul class="navbar-list">

          <li>
            <a href="index.html" class="navbar-link active" data-nav-link>Home</a>
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
          <div class="form-title"><center>Checkout</center></div> 
          <?php
    // Retrieve product details from query parameters
    $productName = isset($_GET['product_name']) ? htmlspecialchars($_GET['product_name']) : '';
    $productPrice = isset($_GET['product_price']) ? htmlspecialchars($_GET['product_price']) : '';
    ?>
          <form method="post" action="" id="checkoutForm">
        <!-- Product details (hidden input fields) -->
        <input type="hidden" name="product_name" value="<?php echo $productName; ?>">
        <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <!-- Quantity input field -->
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1" placeholder="Enter quantity" required>

        <!-- Card details input fields -->
        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" placeholder="Enter card number" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required>

        <!-- Total amount to be paid -->
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" value="<?php echo $productPrice; ?>" readonly>

      </br>
        <!-- Submit button -->
        <button type="submit" class="btn-buy">Buy Now</button>
    </form>

         


         

</body>
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
 
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to input fields
            const quantityInput = document.getElementById('quantity');
            const totalAmountInput = document.getElementById('total_amount');
            const productPrice = parseFloat('<?php echo $productPrice; ?>');

            // Function to calculate total amount
            function calculateTotalAmount() {
                const quantity = parseInt(quantityInput.value);
                const totalAmount = productPrice * quantity;
                totalAmountInput.value = totalAmount.toFixed(2); // Update total amount field
            }

            // Calculate total amount when page loads
            calculateTotalAmount();

            // Add event listener to quantity input for real-time calculation
            quantityInput.addEventListener('input', calculateTotalAmount);

        });
 
        <!-- Custom JavaScript for Form Validation -->
 
        
            document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('checkoutForm');
        form.addEventListener('submit', function(event) {
            // Prevent form submission if validation fails
            if (!validateForm()) {
                event.preventDefault();
            }
        });

        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const quantity = document.getElementById('quantity').value.trim();
            const cardNumber = document.getElementById('card_number').value.trim();
            const expiryDate = document.getElementById('expiry_date').value.trim();
            const cvv = document.getElementById('cvv').value.trim();

            // Name validation (only letters and spaces allowed)
            if (!/^[a-zA-Z\s]+$/.test(name)) {
                alert('Invalid name!');
                return false;
            }

            // Email validation
            if (!isValidEmail(email)) {
                alert('Invalid email address!');
                return false;
            }

            // Quantity validation (must be a positive integer)
            if (!/^[1-9]\d*$/.test(quantity)) {
                alert('Invalid quantity!');
                return false;
            }

            // Card number validation (exactly 16 digits)
            if (!/^\d{16}$/.test(cardNumber)) {
                alert('Invalid card number! It must be exactly 16 digits.');
                return false;
            }

            // Expiry date validation (MM/YYYY format)
            if (!/^(0[1-9]|1[0-2])\/\d{4}$/.test(expiryDate)) {
                alert('Invalid expiry date!');
                return false;
            }

            // CVV validation (exactly 3 digits)
            if (!/^\d{3}$/.test(cvv)) {
                alert('Invalid CVV!');
                return false;
            }

            return true; // Form is valid
        }

        function isValidEmail(email) {
            // Email validation regex pattern
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
    </script>
</body>

</html>