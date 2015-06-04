<?php
session_start();
	require('test1.php');
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$query = mysqli_query($db, "
			SELECT * FROM user WHERE username='$username';
			");
		$count = mysqli_num_rows($query);
		//If count is equal to one, we will send a message. Otherwise display an error message.
		if($count==1){
			$rows=mysqli_fetch_array($query);
			$pass = $rows['password']; //Fetching the password with this
			echo "Your password is ::" . $pass . " ";
			$to = $rows['email'];
			echo "Your email is ::" . $to . " ";

			//SEND AN EMAIL WITH THE DETAILS
			$from = "Numbers Game Webmaster";
			$url = "http://www.onepayapp.com";
			$message = "
			URL:" . $url .";\n
			This email is intended for: " . $to . "\n
			Here is your password : " . $pass . "\n
			Sincerely,\n
			Numbers Game Webmaster";
			$subject = "Numbers Game Password";
			$headers = 'From: j@jlopezloz.com' . "\n" .
			'Reply-to: j@jlopezloz.com';
			$sentmail = mail($to, $subject, $message, $headers);

			echo "Your password is on the way!";
		}
		else{
			if($_POST['email'] != ""){
				echo "<span style='color: #ff0000;'> Not found your email in our database</span>";
				}
			}
		if($sentmail==1) {
			echo "<span stlye='color: #ff0000;'> Your Password Has Been Successfully Sent To Your Email Address.</span>";
		}
		else{
			if($_POST['email'] != ""){
				echo "<span style='color: #ff0000;'> Cannot send your password to your e-mail address. There is a problem with sending the email! </span>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Numbers Game - Forgot Password</title>
</head>
<body>
	<div>
		<?php
			if(isset($msg) & !empty($msg)){
				echo $msg;
			}
		?>
	<h1>Forgot Password</h1>
	<form action="" method="POST">
		<p><label>Username : </label>
			<input id="username" type="text" name="username" placeholder="username"/>
		</p>
		<input class="btn register" type="submit" name="submit" value="Submit"/>
		<a href="testlogin.php">Go Back</a>
	</form>
</body>
</html>