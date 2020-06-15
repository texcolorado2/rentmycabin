<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 28/05/2020
 * Time: 09:39
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="adminpanel pagina met informatie wie wat gehuurd heeft en wanneer">
    <meta name="keywords" content="vakantiehuis,ardennen,durbuy,vakantie">
    <meta name="author" content="Alexander Deelen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin | Admin Panel</title>
    <?php
    include "includes\header.php";
    include "includes\sql.php";

        //haal data op uit database
        $sql = "SELECT * FROM reservering ORDER BY beginDatum";
        $result = $conn->query($sql);
    ?>
</head>
<body>

<table class="table table-striped table-dark data-filter-order-by">
    <thead>
    <tr>
        <th scope="col">reserveringsId</th>
        <th scope="col">Begin datum</th>
        <th scope="col">Eind datum</th>
        <th scope="col">Huis Nummer</th>
        <th scope="col">Aantal mensen</th>
        <th scope="col">Naam hoofdverhuurder</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //laat de gegevens uit de database zien in een tabel
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo"<tr>";
                echo "<th scope=\"row\">".$row['reserveringsId']."</th>";
                echo "<td>".$row['beginDatum']."</td>";
                echo "<td>".$row['eindDatum']."</td>";
                echo "<td>".$row['huisId']."</td>";
                echo "<td>".$row['aantalMensen']."</td>";
                echo "<td>".$row['naamHoofdHuurder']."</td>";
            echo "</tr>";
        }
    }

    ?>
    </tbody>
</table>


<?php include "includes\\footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>