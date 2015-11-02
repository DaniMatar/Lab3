<!DOCTYPE html>
<html>
<head>
    <title>Add new actors</title>
</head>
<body>

<?php
if(!empty($_POST['firstName']) && !empty($_POST['lastName']))
{
    $conn = mysqli_connect("localhost", "root", "inet2005", "sakila");
    if(!$conn)
    {
        die("Unable to connect to database: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO actor (first_name, last_name) VALUES ('";
    $sql .= $_POST['firstName'];
    $sql .= "','";
    $sql .= $_POST['lastName'];
    $sql .= "');";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Unable to insert record: " . mysqli_error($conn));
    }
    ?>

    <table border="1">
    <thead>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    </thead>
    <?php

    $Display = "SELECT first_name,last_name,actor_id FROM actor";
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

