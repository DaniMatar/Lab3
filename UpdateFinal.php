
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


if(isset($_POST['FirstName']) && isset($_POST['actorId']) && isset($_POST['LastName'])) {




    $FN = $_POST['FirstName'];
    $LN = $_POST['LastName'];



    $sql = "UPDATE actor SET first_name = '";
    $sql .= $_POST['FirstName'];
    $sql .= "', last_name = '";
    $sql .= $_POST['LastName'];
    $sql .= "' WHERE actor_id = ";
    $sql .= $actor_id;
    $sql .= ";";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record Deleted";
    } else {
        echo "Unable to Update:" . mysqli_connect_error();

    }
}
mysqli_close($conn);
?>






</body>

</html>




































