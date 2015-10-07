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


    </thead>


    <tbody>

    <?php
    require_once("Connect.php");
    $conn = getDbConnection();


    if (!empty($_POST['search']))
    {
        $result= "SELECT * FROM film VALUES ('";
        $result = $_GET['search'];

        $result= mysqli_query($conn, $result);




    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    else
    {



    }


    mysqli_close($conn);


    }
    ?>
    </tbody>
</table>
<?php include_once("footer.html"); ?>
</body>
</html>
