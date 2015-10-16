<!DOCTYPE html>
<html>
<head>
    <title>DeleteActor</title>
</head>
<body>
<form id="deleteActor" name="deleteActor" method="post" action="DeleteActor.php">
    <p><label>Actor Id <input type="text" name="actorId" id="actorId" /></label></p>
    <p><input type="submit" id="submit" value="delete" /></p>
</form>






<?php
if(!empty($_POST['actorId'])) {



    require_once("Connect.php");
    $conn = getDbConnection();

    $sql = "DELETE FROM actor WHERE actor_id = ";
    $sql .= $_POST['actorId'];
    $sql .= ";";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Unable to Delete record: " . mysqli_error($conn));
    }

    else{
        echo "Affected rows:  ". $result.mysqli_affected_rows($conn);

    }


?>

<table border = "1">
    <thead>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>

    </thead>
    <?php

    $Display = "SELECT first_name,last_name, actor_id FROM actor ORDER BY actor.actor_id DESC LIMIT 10";
    $result2= mysqli_query($conn, $Display);

    if(!$result2)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }



    while($row = mysqli_fetch_assoc($result2)):
        ?>
        <tr>
            <td><?php echo $row['actor_id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>


        </tr>

    <?php
    endwhile;



    mysqli_close($conn);
    }

    ?>
    </tbody>
</table>
</body>
</html>

