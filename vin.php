<?php
    include_once 'header.php';
    include 'config.php';
    include 'cart.php';
    // id_selection
    // 1 - rosu
    // 2 - alb
    // 3 - rose
    // 4 - spumant
    // default = 1
    $id_selection = $_GET['tip_vin'] ?? 1;
    $sql = "SELECT id_vin, product_image, denumire, price FROM wine where id_selection=$id_selection";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <style>
        button {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  font-size: 17px;
  padding: 0.2em 1em;
  font-weight: 500;
  background: #1F2937;
  color: white;
  border: none;
  position: relative;
  overflow: hidden;
  border-radius: 0.6em;
}

.gradient {
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  border-radius: 0.6em;
  margin-top: -0.25em;
  background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3));
}

.label {
  position: relative;
  top: -1px;
}

.transition {
  transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
  transition-duration: 500ms;
  background-color: rgba(16, 185, 129, 0.6);
  border-radius: 9999px;
  width: 0;
  height: 0;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

button:hover .transition {
  width: 14em;
  height: 14em;
}

button:active {
  transform: scale(0.97);
}
</style>

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
                            $counter = 0;
                            while($row = $result->fetch_assoc()) {
                                echo "<form method='post' action='cart.php'>";
                                echo '<div class="col">';
                                    echo '<div class="wrapper-product">';
                                    echo '<img src="data:image/png;base64,' . base64_encode($row["product_image"]) . '"/>';
                                        echo '<div class="product-info">';
                                        echo "<input type='hidden' name='id_vin' value=".$row['id_vin']." />";
                                        echo '<input type="hidden" name="add" value="true"/>';
                                        echo '<span>' .  $row["denumire"] . '</span><br>';
                                        echo '<span>' .  $row["price"]. '<span> RON'  . '</div>';
                                        echo '<button type="submit" class="add">Adaugă în coș</button>';
                                        echo '<button class="add">❤</button>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                echo '</form>';
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