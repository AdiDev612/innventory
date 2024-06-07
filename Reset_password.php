<?php

include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="img/Logo.png" type="image/png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ForgotPassword.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Primachem</title>
</head>
<body>
  <header>
    <nav class="navbar">
      <a href="#" class="logo">
        <img src="img/Logo.png" alt="logo">
        <h2>Primachem</h2>
      </a>
    </nav>  
  </header>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" method="post" class="forgot-password-form">
          <h2 class="title">Reset Password</h2>
          <div class="input-field">
            <i class="bx bx-lock"></i>
            <input type="text" placeholder="New Password" name="password id="password required>
          </div>
          <div class="input-field">
            <i class="bx bx-lock"></i>
            <input type="text" placeholder="Confirm Password" name="password id="password required>
          </div>
          <button class="btn solid" type="submit" name="submit" id="submit">Confirm</button>
          <div class="bottom-link">
            Want to go back?
            <a href="LogIn.php" id="sign-up-btn">Sign in</a>
          </div>
        </form>
      </div>
    </div>
          
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <div class="descript-title">Wellcome Back<br>To <span>Primachem</span> Inventory System</div>
          <p>
           
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="app.js"></script>
</body>
</html>