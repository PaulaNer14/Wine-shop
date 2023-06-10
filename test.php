<?php

    require_once 'config.php';

    $sql = "SELECT * FROM wine";
    $all_product = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title>Wine Corner</title>
</head>
<body>

    <main>
        <?php
            while($row = mysqli_fetch_assoc($all_product)){
        ?>
        <div class="card">
            <div class="image">
                <img src="<?php echo $row["product_image"]; ?>" alt="">
            </div>
            <div class="caption">
                <p class="product_name"><?php echo $row["Denumire"]; ?></p>
                <p class="price"><b><?php echo $row["price"]; ?>RON</b></p>
           </div>
           <button class="add">Add to cart</button>
       </div>
       <?php
            }
        ?>
   </main>
</body>
</html>