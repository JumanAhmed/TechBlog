<?php 
  include '../lib/Session.php';
   Session::checkAdminLoginSession();
?>

<?php include '../lib/DatabasePDO.php';?>
<?php include '../helpers/Format.php';?>

<?php  
     $db = new Database();
     $format = new Format();
     
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

			<?php
		     
		     if ($_SERVER["REQUEST_METHOD"] == "POST") {
		     	  $uname = $format-> test_input($_POST['uname']);
		     	  $pwd = $format-> test_input(md5($_POST['pwd']));

		     	  $query = $db-> loginAdminPanel($uname,$pwd);
		     	  $allinfo = $query->fetch();
		     	  $num = $query->rowCount();

		     	  if ($num == 1) {
		     	  	 Session::set("login", true);
		     	  	 Session::set("uname", $allinfo['uname']);
		     	  	 Session::set("uid", $allinfo['id']);
		     	  	 Session::set("urole", $allinfo['role']);

		     	  	 header("Location: index.php");


		     	  }else{
		     	  	echo "<span style= 'color: red;'>Username and Password are not matched</span>";
		     	  }
		     }

			?>


		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="uname"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="pwd"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="fotgetpass.php">Fotgot Password ?</a>
		</div>
		<div class="button">
			<h3>Tech Blog</h3>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>