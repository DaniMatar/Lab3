<!DOCTYPE html>
<html>
<head>
    <title>Add new actors</title>
</head>
<body>

<?php
if(!empty($_POST['actorId']))
{
$conn = mysqli_connect("localhost", "root", "inet2005", "sakila");
if(!$conn)
{
    die("Unable to connect to database: " . mysqli_connect_error());
}

$sql = "DELETE FROM actor WHERE actor_id = ";
$sql .= $_POST['actorId'];
$sql .= ";";

$result = mysqli_query($conn, $sql);
if(!$result)
{
    die("Unable to insert record: " . mysqli_error($conn));
}
?>

<table>
    <thead>
    <th>First Name</th>
    <th>Last Name</th>
    </thead>
    <?php

    $Display = "SELECT first_name,last_name, actor_id  FROM actor";
    $result2= mysqli_query($conn, $Display);

    if(!$result2)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    while($row = mysqli_fetch_assoc($result2)):
        ?>
        <tr>
            <td><?php echo $row['first_name'] ?></td>

        </tr>

    <?php
    endwhile;
    echo "Affected rows:  ". $result.mysqli_affected_rows($conn);


    mysqli_close($conn);
    }

    ?>
    </tbody>
</table>
</body>
</html>


======================================================================







<!DOCTYPE html>
<html>
<head>
    <title>Delete actors</title>
</head>
<body>
<form id="deleteActor" name="deleteActor" method="post" action="DeleteActor.php">
    <p><label>Actor Id: <input type="text" name="actorId" id="actorId" /></label></p>
    <p><input type="submit" id="submit" value="delete" /></p>
</form>
<?php
if(!empty($_POST['actorId']))
{
    $conn = mysqli_connect("localhost", "root", "inet2005", "sakila");
    if(!$conn)
    {
        die("Unable to connect to database: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM actor WHERE actor_id = ";
    $sql .= $_POST['actorId'];
    $sql .= ";";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Unable to delete record: " . mysqli_error($conn));
    }
    else
    {


        while($row = $result.mysqli_affected_rows($conn)):
            ?>
            <tr>
                <td><?php echo $row['title'] ?></td>

            </tr>

        <?php
        endwhile;
        echo "Affected rows:  ". $result.mysqli_affected_rows($conn);
    }



    mysqli_close($conn);
}

?>
</body>
</html>


