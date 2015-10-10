<!DOCTYPE html>
<html>
<head>
    <title>LAst 10 Rows</title>
</head>
<body>





<?php
    require_once("Connect.php");
    $conn = getDbConnection();


//===============================================================================Connected
?>
<table border="1">
    <thead>
    <th>First Name</th>
    <th>Last Name</th>
    </thead>
    <?php

    $Display = "SELECT first_name,last_name FROM actor ORDER BY actor_id DESC LIMIT 10";
    $result2 = mysqli_query($conn, $Display);

    if (!$result2) {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result2)):
        ?>
        <tr>
            <td><?php echo $row['actor_id'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>>
        </tr>

    <?php
    endwhile;


    mysqli_close($conn);
    ?>





</tbody>
</table>



</body>
</html>


