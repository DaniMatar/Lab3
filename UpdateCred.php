<!DOCTYPE html>
<html>
<head>
    <title>Update Actor</title>
    <style>
        table, th, tr, td { border: solid 2px black;}
    </style>
</head>
<body>

<?php
require_once("Connect.php");
$conn = getDbConnection();


$actor_id = $_POST['actorId'];

?>


<?php


    $sql = "SELECT first_name, last_name FROM actor WHERE actor_id = '$actor_id'";


$sql2 = mysqli_query($conn, $sql) ;

while ($row = mysqli_fetch_assoc($sql2)):
?>

<form action="UpdateFinal.php" method="POST"  >

    <label>First Name<input id="FirstName" type="text"  value="<?php echo $row['first_name'] ?>" placeholder="FirstName" name = "FirstName"></label><br>

        <label>Last Name<input id="LastName" type="text" value="<?php echo $row['last_name'] ?>" placeholder="LastName" name = "LastName"></label><br>

    <input type="hidden" name="actorId" id="actorId" value="<?php echo $_POST['actorId']; ?>" />

    <input id="submit" type="submit" value="Update">
</form>


<?php
endwhile;





mysqli_close($conn);

?>






</body>

</html>