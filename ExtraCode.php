
echo "<table border='1'>
<tr>
<th>name</th>
<th>old price</th>
<th>price</th>
<th>delete</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['old_price'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
echo "<td>"<!-- how could I add a button here? -->"</td>";
  echo "</tr>";
  }
echo "</table>";

?>


<?php
die();

?>
<br><?php echo $row['number'];?><br>
<?php


function loadNumbers(){
    $data = file_get_contents('numbers.file');
    return unserialize($data);
}
function saveNumbers($numbers,$db){
    $result = mysqli_query($db, "INSERT INTO aca_categories (number) VALUES ('$numbers');");

    $result = mysqli_query($db, 'SELECT * FROM aca_categories;');

    $rows = array();
    while($row[]=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function load_numbers_SQL($db){
    $result = mysqli_query($db, 'SELECT * FROM aca_categories;');

    $rows = array();
    while ($row[] = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
        return $rows;
}

$db = init_db();

/*
 if(!file_exists('numbers.file')){
    $blankData= serialize(array());
    file_put_contents('numbers.file',$blankData);
}
 */


$numbers = load_numbers_SQL($db);



if(count($_POST)>0) {
    $numbers [] = (int)$_POST['number'];
    saveNumbers($numbers,$db);
}

#$numbers = array(1,2,3,4,5,6,11,100,1000);

#print_r($numbers);

?>

<!DOCTYPE html>
<head>
    <title>OnePay - Home</title>
    <link rel="apple-touch-icon" href="OnePay_icon.png" />
    <script>
        function areYouSure(link) {
            result = confirm('Are your sure?');
            if(result){
                document.location =link;
            }
        }
    </script>
</head>
<body>
<!--<img rel="apple-touch-icon" height="114" width="114" src="OnePay_icon.png" />-->
<div><h2>Your list of numbers</h2></div>
<?php

sort($numbers);
foreach($numbers as $individual){
    ?>
        <div><?php echo (int)$individual;?></div>
    <?php
}
?>

<div><a onclick="areYouSure('/categories.php')" href="#">Delete List</a></div>

<h2>Even Numbers</h2>
<?php categorizeNumbersEven($numbers);?>

<h2>Odd Numbers</h2>
<?php categorizeNumbersOdd($numbers);?>

<h2>Input</h2>
<form method="post">
    <div>
        <label for="number">Number</label><br>
        <input name="number">
    </div>
    <div>
        <input type="submit" value="Send!">
    </div>
</form>
</body>



