<?php
#this is my code (JG Lopez)
require('test1.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $encrypted_password = md5('$password');

    $query1 = mysqli_query($db, "
        CREATE TABLE number_$username (number_id INTEGER PRIMARY KEY AUTO_INCREMENT, number VARCHAR(100), date TIMESTAMP);
         ");
    $query = mysqli_query($db, "
        INSERT INTO user (username, password, email) VALUES ('$username', '$encrypted_password', '$email');
        ");
    if($query && $query1){
        $msg="User Created Successfully.";
        header('Refresh: 2; URL=testlogin.php');
        #header( "Location: testlogin.php");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Numbers Game</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div>
        <?php
            if(isset($msg) & !empty($msg)){
                echo $msg;
            }
         ?>
        <h2>Register</h2>
        <form action="" method="POST">
            <p><label>Username&nbsp; : </label>
            <input id="username" type="text" name="username" placeholder="Username" /></p>
            <p><label>E-Mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
            <input id="email" type="text" name="email" required placeholder="email@domain.com"/></p>
            <p><label>Password&nbsp;&nbsp; :</label>
            <input id="password" type="password" name="password" placeholder="Password"/></p>
            <input type = "submit" name="Go!" value="Register"/>
        </form>
</body>
</html>

