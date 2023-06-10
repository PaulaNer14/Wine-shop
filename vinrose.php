<?php
    include_once 'header.php';
    include 'config.php';

    $sql = "SELECT product_image, Denumire, price FROM wine Where id_selection=3";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Wine Corner</title>
</head>
<body>
<div class="container">
    <div class="col-lg-4 col-md-3 col-sm-4">
        <p class="lineeffect">
            <a href="#">
                <img src="images/p2.jpg" class="img-responsive img-fill" alt="">
            </a>
        </p>
    </div>
    <div class="col-lg-4 col-md-3 col-sm-4">
        <p class="lineeffect">
            <a href="#">
                <img src="images/p1.jpg" class="img-responsive img-fill" alt="">
            </a>
        </p>
    </div>
    <div class="col-lg-4 col-md-3 col-sm-4">
        <p class="lineeffect">
            <a href="#">
                <img src="images/p3.jpg" class="img-responsive img-fill" alt="">
            </a>
        </p>
    </div>
    <main>
        <?php
                echo '<table>';   
                echo '<tr>';
                echo '<div class="container">';
                echo '<div class="row">';
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-3">';
                    echo '<div class="wrapper-product">';
                    echo '<img src="data:image/png;base64,' . base64_encode($row["product_image"]) . '"/>';
                    echo '<div class="product-info">';
                    echo '<span>' .  $row["Denumire"] . '</span><br>';
                    echo '<span>' .  $row["price"]. '<span> RON'  . '</div>';
                    echo '<button class="add">Adaugă în coș</button>';
                    echo '<button class="add">❤</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }   
                echo '</div>';
                echo '</div>';
                echo'</tr>';
                echo'</table>';
            $conn->close();
            
        ?>
   </main>
</body>
<?php
    include_once 'footer.php';
?>
</html>