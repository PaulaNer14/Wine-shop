
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wine Corner</title>
    <link rel="stylesheet" href="Dependencies/bootstrap.css">
    <link rel="stylesheet" href="Dependencies/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="Dependencies/owl.carousel.min.css">
    <link rel="stylesheet" href="Dependencies/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product.css">
</head>
<header>
    <div class="main_header header_transparent header-mobile-m">
        <div class="header_container sticky-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2" style="display: inline-block;">
                        <div class="logo">
                            <a href="index.html"> <img src="images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6" style="display: inline-block;">
                        <div class="main_menu menu_two menu_position">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="index.html">Acasa</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="vinalb.php">Vin Alb</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="vinrosu.php"class="active">Vin Rosu</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="vinrose.php">Vin Rose</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="contact.html">Contact</a>
                                    </li>
                                    <li class="mega_items">
                                        <a href="login.php">Login/Register</a>
                                     </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
				</nav>
			</div>
		</div>
 <section class="contact-information padding-large bg-sand">
    
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
</header>
<body>
    <main>
            <?php
              include 'product.php';

                $sql = "SELECT product_image, Denumire, price FROM wine Where id_selection=1";
                $result= $conn->query($sql);   
                
                 if ($result->num_rows > 0) {          
                    while($row = $result->fetch_assoc()) {
                            echo '<td><img class="product-image" src="data:image/jpg;base64,'.base64_encode($row["product_image"]).'"/></td>';
                            echo '<td class="Denumire">'.$row["Denumire"].'</td>';
                            echo '<td class="price">'.$row["price"].'</td>';
                    }   
                } else {
                     echo "0 results";
                }
            $conn->close();
            ?>
            <button class="add">Adauga in cos</button>
        </div>
    </main>
</body>
</html>


