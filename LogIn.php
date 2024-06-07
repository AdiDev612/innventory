<?php
$host="localhost";
$user="root";
$password="";
$db="primachem";

session_start();


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from login where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if ($row !== null) {
		if($row["usertype"]=="user")
		{	

			$_SESSION["username"]=$username;

			header("location:Dashboard.php");
		}

		elseif($row["usertype"]=="admin")
		{

			$_SESSION["username"]=$username;
			
			header("location:.php");
		}
	} else {
		echo "";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="img/Logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styls.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Primachem</title>
</head>
<body>
    <div class="home-container">
        <div class="home-upper">
            <header>
                <nav class="navbar">
                    <a href="#" class="logo">
                        <img src="img/Logo.png" alt="logo">
                        <h2>Primachem</h2>
                    </a>
                </nav>
            </header>
        </div>
        <div class="home-bottom">
            <div class="home-left">
                <div class="panels-container">
                    <div class="panel left-panel">
                        <div class="content">
                            <div class="descript-title">Wellcome Back<br>To <span>Primachem</span> Inventory System</div>
                            <p>
                                primachem cosmetic manufacturing is a sole pritorship organization established in January 2010 to
                                serve as a toll cosmetics manufacturer, their main facility is located at 179 deleon street veterans village barngay Holly spirits  Quezon city.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="home-right">
                <div class="forms-container">
                    <form action="#" method="POST">
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="bx bx-envelope"></i>
                            <input type="text" placeholder="username" name="username" required>
                        </div>
                        <div class="input-field">
                            <i class="bx bx-lock"></i>
                            <input type="password" placeholder="Password" name="password" required>
                        </div>
                            
                            <button class="btn solid" type="submit" name="submit">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>