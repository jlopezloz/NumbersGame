<?php
#this is my code (JG Lopez)

function init_db(){
    $db = mysqli_connect('localhost','root','root');
    mysqli_select_db($db, 'acashop');
    return $db;
}

?>
<!DOCTYPE html>


<html>
<head>
    <title>Where does this title go?</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div>
        <h2>Register</h2>
        <form action="" method="POST">
            <p><label>LABEL : </label>
            <input id="username" type="text" name="username" placeholder="Username" /></p>
            <p><label>E-Mail :</label>
            <input id="email" type="text" name="email" required placeholder="youremail@yourdomain.com"/></p>
            <p><label>Password :</label>
            <input id="password" type="text" name="password" placeholder="Password"/></p>
            <input type = "submit" name="Go!" value="Register"/>
        </form>
</body>
</html>





<?
die();
function init_db(){
$db= mysqli_connect('localhost', 'root', 'root');
/*?>
<div><?php echo "YES!"; ?><div>   // We used this to see if the database connected correctly
    <?php
    */
if (!$db){
    die("Database Connection Failed" . mysql_error());
}
return $db;
$select_db = mysqli_select_db($db,'acashop');
/*?>
<div><?php echo "YES!"; ?><div>   // We used this to see if the database connected correctly
    <?php
    */
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
}

$db = init_db();

	require('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($db, $query);
        if($result){
            $msg = "User Created Successfully.";
        }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Simple user registration Script</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <!-- Form for logging in the users -->
<div class="register-form">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
<h1>Register</h1>
<form action="" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" /></p>
	
	<p><label>E-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
	 <input id="password" type="email" name="email" required placeholder="youremail@yourdomain.com" /></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" /></p>
 
    <!--<a class="btn" href="login.php">Login</a>-->
    <input class="btn register" type="submit" name="submit" value="Register" />
    </form>
</div>
</body>
</html>