<?php 
session_start();
	require('test1.php');
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$encrypted_password = md5('$password');

		$query = mysqli_query($db,"
			SELECT * FROM user WHERE username='$username' and password='$encrypted_password';
			");
		$count = mysqli_num_rows($query);

		if($count == 1){
			$_SESSION['username'] = $username;
		}
		else{
			echo "Invalid Login Credentials.";
		}
	}

	if(isset($_SESSION['username'])) {
		header('Refresh: 0.5; URL=categories.php');
		$username = $_SESSION['username'];
		?>
		<div><?php echo "Hello  " . $username . " ";?></div>
		<div><?php echo "Welcome to the Members Area";?></div>
		<?php
	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Numbers Game Login</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<div>
		<?php
			if(isset($msg) & !empty($msg)){
				echo $msg;
			}
		?>
		<h1>Login</h1>
		<form action="" method = "POST">
			<p><label>User Name : </label>
			<input id="username" type="text" name="username" placeholder="username"/>
			</p>
			<p><label>Password&nbsp;&nbsp; : </label>
			<input id="password" type="password" name="password" placeholder="password"/>
			</p>
			<input type="submit" name="submit" value="Login"/>
		</form>
		<div>Don't have an account?</div>
		<a href="test.php">Create an account</a>
		<div></div><br>
		<div>Forgot your password?</div>
		<a href="testforgot.php">Forgot Password</a>
	</div>
<?php
}
?>
</body>
</html>

