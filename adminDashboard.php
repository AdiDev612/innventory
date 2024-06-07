<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Primachem</title>
    <link rel="stylesheet" href="dash.css">
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
        <a href="#">
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
       <a href="Product.php">
         <i class='bx bx-package' ></i>
         <span class="links_name">Products</span>
       </a>
       <span class="tooltip">Products</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-notification' ></i>
         <span class="links_name">Notification</span>
       </a>
       <span class="tooltip">Notification</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="img/Logo.png" alt="profileImg">
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
    <div class="text">| Dashboard</div>
    <div class="home-container">
      <div class="home-left">
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count">0</span>
              </h3>
              <p>Total Products</p>
              <div class="float-right"></div>
          </div>
        </div>
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count">0</span>
              </h3>
              <p>CAPS</p>
              <div class="float-right"></div>
          </div>
        </div>
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count">0</span>
              </h3>
              <p>CAPS</p>
              <div class="float-right"></div>
          </div>
        </div>
      </div>

      <div class="home-center">
      <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count">0</span>
              </h3>
              <p>CAPS</p>
              <div class="float-right"></div>
          </div>
        </div>
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count">0</span>
              </h3>
              <p>CAPS</p>
              <div class="float-right"></div>
          </div>
        </div>
        <div class="card-body color1">
          <div class="float-left">
              <h3>
              <span class="count">0</span>
              </h3>
              <p>CAPS</p>
              <div class="float-right"></div>
          </div>
        </div>
      </div>
      
      <div class="home-right">
        <div class="todo">
          <div class="text">To do list</div>
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
  }
  </script>
</body>
</html>