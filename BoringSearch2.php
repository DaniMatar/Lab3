
<!DOCTYPE html>
<html>
<head>
    <title>Our film list</title>
    <style>
        table, th, tr, td { border: solid 2px black;}
    </style>
</head>
<body>
<table>
    <thead>
    <th>Title</th>
    <th>Description</th>
    </thead>


    <?php
    require_once("Connect.php");
    $conn = getDbConnection();

    $search = $_POST['SearchB'];

    $sql= "SELECT * FROM film WHERE description LIKE ('%";
    $sql .=   $search;
    $sql .= "%')";
    $sql .= "LIMIT 25";







    $result= mysqli_query($conn, $sql);

        if(!$result)
        {
            die("Could not retrieve records from database: " . mysqli_error($conn));
        }

    while($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?></td>
        </tr>

    <?php
    endwhile;

    mysqli_close($conn);
    ?>
    </tbody>
</table>

</body>
</html>























