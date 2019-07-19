<?php  include'inc/header.php'; ?>

<?php
  		if ($_SERVER["REQUEST_METHOD"] == "POST"){

  			   $fname = $format->test_input($_POST['firstname']);
  			   $lname = $format->test_input($_POST['lastname']);
  			   $email = $format->test_input($_POST['email']);
  			   $body  = $format->test_input($_POST['body']);

  			   $errorf = "";
  			   $errorl = "";
  			   $errore = "";
  			   $errorb = "";
  			   $error = "";
  			   $msg = "";
  			   $correctEmail ="";

  			   if (empty($fname)) {
  			   	   $errorf = "First Name Must not be empty !";
  			   }
  			   if (empty($lname)) {
  			   	   $errorl = "Last Name Must not be empty !";
  			   }
  			   if (empty($email)) {
  			   	   $errore = "Email Field Must Not be empty !";
  			   }
  			   if (!empty($email)) {
  			   	   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			   	  $errore = "Invalid Email Address !";
  			   		}else{
  			   			$correctEmail = $email;
  			   		}
  			   }
  			   if (empty($body)) {
  			   	   $errorb = "Body Must Not be empty !";
  			   }
			   if(!empty($fname) and !empty($lname) and !empty($correctEmail) and !empty($body)) {
  			   	 $result = $db-> insertEachContact($fname,$lname,$correctEmail,$body);
                if($result) {
                    $msg = "Message Sent Successfully !";
                 }else {
                    $error = "Message Not Sent !";
                       }
  			   }
                         

        }
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<?php if (isset($errorf)) {
						echo "<span style='color:red'>$errorf</span>";
					} ?>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<?php if (isset($errorl)) {
						echo "<span style='color:red'>$errorl</span>";
					} ?>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<?php if (isset($errore)) {
						echo "<span style='color:red'>$errore</span>";
					} ?>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<?php if (isset($errorb)) {
						echo "<span style='color:red'>$errorb</span>";
					} ?>
					<textarea name="body"></textarea>

					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
				<?php 
					if (isset($error)) {
						echo "<span style='color:red'>$error</span>";
					}
					if (isset($msg)) {
						echo "<span style='color:green'>$msg</span>";
					}
					
				?>
		</table>
	<form>				
 </div>

		</div>

	<?php include "inc/sidebar.php"; ?>
	<?php include "inc/footer.php"; ?>
		