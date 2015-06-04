<?php
session_start();
require('test1.php');
$username = $_SESSION['username'];

if(count($_POST) > 0){
    #echo $_POST['number']; //we used this to check if the post variables were being passed thru
    $id = $_POST['number'];
    $query = mysqli_query($db, "
        INSERT INTO number_$username (number) VALUES ('$id');"
        );
}
$result = mysqli_query($db, "
SELECT * FROM number_$username;"
);
$countrows = mysqli_num_rows($result);
if($countrows > 0){

$odd = array();
$even = array();
$numbers= array();
 
while($numbers[] = mysqli_fetch_assoc($result)) {}
foreach($numbers as $row) {
    $nomba = (int)($row['number']);
    #settype($row['number'], "integer");
/*    ?>
<div><?php print_r($row['number']);?><div>   // this returns all the numbers in the SQL file
<?php
*/
     if ($nomba % 2 == 0){ 
        $even[] = $nomba;    
               /* ?>
                <div><?php echo $row['number'];?></div>  // We used this to see the numbers before adding them into the variable
            <?php
            */
            }
    else{
        #settype($row['number'], "integer");
        $odd[] = $nomba;
    }
}
/*if (is_numeric($row['number'])) {      // We used this to see if the numbers being looped were integers or not WITHIN THE LOOP.
    echo "YES MODAFOCKA!";
}
*/
}
if (isset($_POST['deletelist'])) {
    $deletequery = mysqli_query($db,"
        TRUNCATE number_$username;"
        );
    $change = "List Successfully Deleted";
    header("Refresh: 0.5;");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
        <?php
        if(isset($change)){
            echo $change;
        }
        else{
            ?>
        <div><?php echo "Welcome " . $username . "."; ?></div>
        <div>It's time to play again.</div>
        <a href="testlogout.php">Logout</a>
        <?php
        }
        ?>
        <h2>Numbers Game</h2>
        <form action="" method="post">
            Enter a Number <input type="text" name="number">
            <input type="submit" value="Go!"> 
            <?php echo '<input type="submit" name="deletelist" value="Delete List">';
            ?>
        </form>
        
    <body>
       <table style ="width:100%">
            <tr>
                <th><h2>Odd Numbers</h2></th>
                <th><h2>Even Numbers</h2></th>
            </tr>
            <tr style = "text-align: center" rowspan = "1000" text-align="center" >
                <td><?php
                if(isset($odd) && isset($even)) {      ##we used this so the code would'nt break when there were no numbers in the DB
                sort($odd);
                sort($even);

                foreach ($odd as $indiv) {
                ?><div><?php print_r($indiv);?></div>
                <?php
                }
                ?>
                </td>

                <td><?php 
                foreach ($even as $indivi) {
                
                ?><div><?php print_r($indivi);?></div>
                <?php
                }
                }
                ?>
                </td>
            </tr>
        </table>

        <?php print_r($even); echo "</br>";?>
        <?php print_r($odd);?>

<html>