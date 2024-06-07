<?php
include("connection.php");

if(isset($_POST['update'])){
    $id = $_SESSION['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "UPDATE users SET email='$email', password='$password' WHERE id=$id";
    mysqli_query($conn, $query);
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Primachem</title>
    <link rel="stylesheet" href="settings.css">
    <link rel="icon" href="img/Logo.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="img/Logo.png">
    </div>
    <ul class="nav-list">
      <li>
        <a href="Dashboard.php">
          <i class='bx bx-grid-alt'></i>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="Inventory.php">
         <i class='bx bx-layer' ></i>
       </a>
       <span class="tooltip">Inventory</span>
     </li>
     <li>
       <a href="product.php">
         <i class='bx bx-package' ></i>
       </a>
       <span class="tooltip">Products</span>
     </li>
     <li>
      <a href="Notification.php">
        <i class='bx bxs-notification' ></i>
      </a>
      <span class="tooltip">Notification</span>
    </li>
     <li>
       <a href="Settings.php">
         <i class='bx bx-cog' ></i>
       </a>
       <span class="tooltip">Settings</span>
     </li>
     <li>
      <a href="Logout.php">
        <i class='bx bx-log-out'></i>
        </a>
        <span class="tooltip">Log Out</span>
     </li>
    </ul>
  </div>

  <section class="home-section">
      <div class="text">| Settings</div>
      <div id="containers">
        <div class="setting">
          <h2>Settings</h2>
          <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email'];?>" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $row['password'];?>" required>
            <button type="submit" name="update">Update</button>
          </form>
        </div>
      </div>
  </section>
  <script src="script.js"></script>
</body>
</html>