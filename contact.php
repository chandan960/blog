<?php include 'inc/header.php'; ?>
<?php
if (isset($_REQUEST['submit'])) {
	extract($_REQUEST);
	$firstname=$fm->validation($_REQUEST['firstname']);
	$lastname=$fm->validation($_REQUEST['lastname']);
	$email=$fm->validation($_REQUEST['email']);
	$message=$fm->validation($_REQUEST['message']);
	$error="";
	$errorf="";
	$errorl="";
	$errore="";
	$errorm="";
	if(empty($firstname)){
		$errorf="First name must not be empty";
	}
	elseif(!filter_var($firstname,FILTER_SANITIZE_SPECIAL_CHARS)){
		$errorf="Firstname is invalid";
	}
	elseif(empty($lastname)){
		$errorl="Last name must not be empty";
	}
	elseif(!filter_var($lastname,FILTER_SANITIZE_SPECIAL_CHARS)){
		$errorl="lastname is invalid";
	}
	elseif(empty($email)){
		$errore="Email must not be empty";
	}
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$errore="Email is invalid";
	}
	elseif(empty($message)){
		$errorm="Message must not be empty";
	}else{
		$value=$db->Insert("tbl_contact","firstname='$firstname',lastname='$lastname',email='$email',message='$message'");
		if($value==true){
			$msg="Message send successfully...";
		}else{
			$error="Message not send ...";
		}
	}
}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
				if(isset($error)){
					echo "<span style='color:red'>$error</span>";
				}if(isset($msg)){
					echo "<span style='color:green'>$msg</span>";
				}
				?>
			<form action="" method="post">
				<table>
				<tr>
				
					<td>Your First Name:</td>
					<td>
				<?php
				if(isset($errorf)){
					echo "<span style='color:red; float:left;'>$errorf</span>";
				}
				?>
					<input type="text" name="firstname" placeholder="Enter first name" 
					/>
					</td>
				</tr>
				<tr>
					
					<td>Your Last Name:</td>
					<td>
						<?php
				if(isset($errorl)){
					echo "<span style='color:red; float:left;'>$errorl</span>";
				}
				?>
					<input type="text" name="lastname" placeholder="Enter Last name" 
					/>
					</td>
				</tr>
				
				<tr>
					
					<td>Your Email Address:</td>
					<td>
						<?php
				if(isset($errore)){
					echo "<span style='color:red; float:left;'>$errore</span>";
				}
				?>
					<input type="email" name="email" placeholder="Enter Email Address" 
					/>
					</td>
				</tr>
				<tr>
					
					<td>Your Message:</td>
					<td>
						<?php
				if(isset($errorm)){
					echo "<span style='color:red; float:left;'>$errorm</span>";
				}
				?>
					<textarea name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
	
<?php include 'inc/sidebar.php'; ?>		
<?php include "inc/footer.php";?>
