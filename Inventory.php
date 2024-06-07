<?php
@include 'connection.php';
session_start();
$name = mysqli_query($conn, "SELECT * FROM login");
$row = mysqli_fetch_assoc($name);
$_SESSION['usertype'] = $row['usertype'];

if(isset($_POST['add_product'])){
  $usertype = $_SESSION['usertype'];
   $product_name = $_POST['product_name'];
   $product_id = $_POST['product_id'];
   $product_variant = $_POST['product_variant'];
   $product_expiry = $_POST['product_expiry'];
   $product_stocks = $_POST['product_stocks'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_id) || empty($product_image)){
      $message[] = 'please fill out all';
   }else{
    mysqli_query($conn, "INSERT INTO notification(usertype,actions) values('$usertype', 'New Product Has Been Added')");
      $insert = "INSERT INTO products(product_name, product_id, product_variant, product_expiry, product_stocks, product_image) VALUES('$product_name', '$product_id', '$product_variant', '$product_stocks', '$product_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
         header('Location: Inventory.php');
         exit;
      }else{
         $message[] = 'could not add the product';
      }
   }
};

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $query = "SELECT * FROM products WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    $product_image = $row['product_image'];
    unlink('uploaded_img/'.$product_image);
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:Inventory.php');
  }else{
    $message[] = 'product not found';
  }
};

$product_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM products");
$product_count = mysqli_fetch_assoc($product_count);
$product_count = $product_count['count'];

$select = mysqli_query($conn, "SELECT * FROM products");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Primachem</title>
    <link rel="stylesheet" href="inventt.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Primachem</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="Dashboard.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="Inventory.php">
         <i class='bx bx-layer' ></i>
         <span class="links_name">Inventory</span>
       </a>
       <span class="tooltip">Inventory</span>
     </li>
     <li>
       <a href="Inventory.php">
         <i class='bx bx-box' ></i>
         <span class="links_name">Archive</span>
       </a>
       <span class="tooltip">Archive</span>
     </li>
     <li>
       <a href="Inventory.php">
         <i class='bx bx-car' ></i>
         <span class="links_name">Deliver</span>
       </a>
       <span class="tooltip">Deliver</span>
     </li>
     <li>
       <a href="Notification.php">
         <i class='bx bx-notification' ></i>
         <span class="links_name">Notification</span>
       </a>
       <span class="tooltip">Notification</span>
     </li>
     <li>
       <a href="Settings .php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="img/.png" alt="profileImg">
           <div class="name_job">
             <div class="name">Adrian</div>
             <div class="job">Employee</div>
           </div>
         </div>
         <a href="Logout.php">
          <i class='bx bx-log-out' id="log_out" ></i>
         </a>
     </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">| Deliver
    </div>  
    <div class="home-container">
      <div class="home-left">
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count"><?php echo $product_count; ?></span>
              </h3>
              <p>Pending deliver</p>
              <div class="float-right"></div>
          </div>
        </div>
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count"><?php echo $product_count; ?></span>
              </h3>
              <p>Total Product Archive</p>
              <div class="float-right"></div>
          </div>
        </div>
      </div>

      <div class="home-right">
        <div class="product-container">
          <div class="text">Products Stocks</div>
            <div class="upper">
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="NAME" name="product_name" class="input-name" required>
                <input type="text" placeholder="CODE" name="product_code" class="input-id" required>
                <input type="text" placeholder="VARIANT" name="product_variant" class="input-variant" required>
                <input type="date" placeholder="" name="product_expiry" class="input-date" required>
                <input type="text" placeholder="STOCKS" name="product_stocks" class="input-stocks" required>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
                <input type="submit" class="btn" name="add_product" value="Add Deliver">
              </form>
            </div>
          <div class="mid">
          <div class="product-display">
              <table class="product-display-table">
                <thead>
                  <tr>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>CODE</th>
                    <th>ID</th>
                    <th>VARIANT</th>
                    <th>STOCKS</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($select)){ ?>
                  
                <tr>
                    <td><img src="uploaded_img/<?php echo htmlspecialchars($row['product_image'], ENT_QUOTES, 'UTF-8'); ?>" height="50" alt=""></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_variant']; ?></td>
                    <td><?php echo $row['product_expiry']; ?></td>
                    <td><?php echo $row['product_stocks']; ?></td>
                  <td>
                    <button type="button" class="edit-button">Edit</button>
                    <button type="button" class="archive-button">Archive</button>
                    <button type="button" class="delete-button" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                  </td>
                </tr>
                <?php } ?>
              </table>
          </div>
        </div>
      </div>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
    document.body.classList.toggle("sidebar-open");
  });
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
   }
  } function confirmDelete(id) {
    if (confirm("Are you sure do you want to delete this product?")) {
      window.location.href = "Inventory.php?delete=" + id;
    }
  }
  </script>
</body>
</html>