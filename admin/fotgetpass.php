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
		     	  $email = $format-> test_input($_POST['email']);

		     if (!empty($email)) {
  			   	  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			   	  	echo "<span style='color:red;font-size:18px;'>Invalid Email Address ! !</span>";
  			   		}else{
						$query    = $db-> checkExistsMailByEmail($email);
                      	$row      = $query->rowCount();
                      	$allinfo  = $query->fetch();
                      	$userId   = $allinfo['id'];
                      	$userName = $allinfo['uname'];
                      	if ($row >0) {
                      		$text = substr($email, 0, 4); //take 4 latter from email for a pass
                      		$rand = rand(10000, 99999);  //take a random value from this range
                      		$newpass = "$text$rand";
                      		$pass  = md5($newpass);

                      		$update = $db-> updateUserPassword($pass,$userId);

                      		$to  		= "email";
                      		$from  		= "jumanahmedjaki@gmail.com";
                      		$headers    = "From: $from\n";
                      		$headers  .= 'MIME-Version: 1.0'. "\r\n" ;
							$headers  .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n" ;
							$subject  = "Your Password";
							$message  = "Your Username is: ".$userName." and new is  Password: ".$newpass;

                      		$sendmail 	= mail($to, $subject, $message,$headers);
                      		if ($sendmail) {
                      			echo "<span style='color:green;font-size:18px;'>Check Your Email Adress Please for new password !</span>";
                      		}else{
                      			echo "<span style='color:red;font-size:18px;'>Email Not Send !</span>";
                      		}

                      		 
                      	}else{
                      		echo "<span style='color:red;font-size:18px;'>Email Not Exists !</span>";
                      	}
                      		}
  			   		
		     }else{
		     	  echo "<span style='color:red;font-size:18px;'>Field Must Not be Empty !</span>";
		     }
		 }

			?>


		<form action="" method="post">
			<h1>Password Recovery </h1>
			<div>
				<input type="text" placeholder="Enter Your Email "  name="email"/>
			</div>
			<div>
				<input type="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div>
		<div class="button">
			<h3>Tech Blog</h3>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>