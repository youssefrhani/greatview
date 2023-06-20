<!DOCTYPE html>
<html lang="en">
<head>
    <title>SRI</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">   
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-color : #353c41;">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					GreatView
				</span>
            <form action = "index.php" method="post" class="login100-form validate-form p-b-33 p-t-5">

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="User name">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password incorrect">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
			
				<div class="container-login100-form-btn m-t-32">
                <a href="aboutus.html"><button class="login100-form-btn" type="button">About Us</button> </a>
            </div>
            </form>
        </div>
    </div>

</div>
<?php

		session_start();
		error_reporting(E_ERROR | E_PARSE);

		$conn = mysqli_connect("localhost", "root", "", "login_db");

		$username = $_POST['username'];
		$password = $_POST['password'];

		$result_login = mysqli_query($conn, "SELECT * from login");

		if($conn == true)
		{
			while($ligne_login = mysqli_fetch_row($result_login))
			{
				$id = $ligne_login[0];
				$user = $ligne_login[1];
				$pass = $ligne_login[2];

				if($id == 1 && $username == $user && $password == $pass)
				{
					$_SESSION['username'] = $username;
					header('Location: root/rootPage.php');
				}
				else 
				{
					if ($id == 2 && $username == $user && $password == $pass) 
					{
						$_SESSION['username'] = $username;
						header('Location: user/userPage.php');
					}
					else
					{
						echo '';
					}
				}				
			}			
		}
?>


</body>
</html>