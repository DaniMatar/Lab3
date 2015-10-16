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
?>


<?php
if(!empty($_POST['UpdateActor'])) {


    $sql = "SELECT first_name, last_name FROM actor WHERE actor_id = ";
    $sql .= $_POST['UpdateActor'];
    $sql .= ";";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Unable to Delete record: " . mysqli_error($conn));
    } else {
        echo "Affected rows:  " . $result . mysqli_affected_rows($conn);

    }



}


?>











<form action="UpdateCred.php" method="POST">
    <input id="searchF" type="text" placeholder="First Name" name = "firstName" value="<?php echo $first_name ?>" >
    <input id="searchL" type="text" placeholder="Last Name" name = "lastName" value="<?php echo $last_name ?>" >
    <input id="submit" type="submit" value="Update">
</form>













</body>

</html>
