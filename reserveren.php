<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 28/05/2020
 * Time: 09:38
 */
session_start();
include "includes\sql.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin</title>
    <?php
    include "includes\header.php";
    ?>
</head>
<body>

<?php
    $sql = "SELECT * FROM huizen";
    $result = $conn->query($sql);
?>

<div class="container">
    <div class="row col-12">
        <?php
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row['aantalMensen']== 2){
                    $prijs2Nachten = "€280,-";
                    $prijs5Nachten = "€580,-";
                    $prijs7Nachten = "€720,-";
                }
                if($row['aantalMensen'] == 4){
                    $prijs2Nachten = "€480,-";
                    $prijs5Nachten = "€1080,-";
                    $prijs7Nachten = "€1350,-";
                }
                if($row['aantalMensen'] == 6){
                    $prijs2Nachten = "€640,-";
                    $prijs5Nachten = "€1440,-";
                    $prijs7Nachten = "€1950,-";
                }
                echo "<div class=\"card col-9\" >";
                    echo "<div class=\"row no-gutters\">";
                        echo "<div class=\"col-3\">";
                            echo "<img src=".$row['image']." class=\"card-img\" alt=\"...\" width=\"100\" height=\"172\">";
                        echo "</div>";
                    echo"<div class=\"col-7\">";
                        echo"<div class=\"card-body\">";
                            echo "<h5 class=\"card-title\">Huis voor " .$row['aantalMensen']. " personen. Prijs 2 nachten: ".$prijs2Nachten." Prijs 5 nachten: ".$prijs5Nachten." Prijs 7 nachten: ".$prijs7Nachten."</h5>";
                                echo "<p class=\"card-text\">Dit huis in de ardennen is voorzien 
                                     van alle luxe die je nodig hebt om een fijne vakantie te hebben. 
                                     in het huis kun je spullen vinden voor het slapen en om er te koken.</p>";
                                echo"</div>";
                            echo "</div>";
                    echo "<div class=\"col-2 d-flex align-items-end \" id=\"reserveren\">";
                        echo "<a class=\"mt-auto p-1\" href=\"detail.php\" >details</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo"<div class=\"card col-3\" >";
                    echo"<div class=\"row no-gutters\">";
                        echo"<div class=\"col-12 d-flex align-items-end\" id=\"reserveren\">";
                            echo"<a class=\"mt-auto p-1\"  href=\"reserveringPagina.php?id=".$row['huisId']."\" >reserveren</a>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        ?>

    </div>
</div>



<?php include "includes\\footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
