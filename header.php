<?php
include 'cart.php';
//    start session if not started
    if(session_status() !== 2) {
        session_start();
    }
    $cart = $_SESSION['shopping_cart'] ?? [];
    $total = $_SESSION['total'] ?? 0;
    $wishList = $_SESSION['wish_list'] ?? [];

?>

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
                            <a href="index.php"> <img src="images/logo1.jpg" alt=""></a>
                        </div>
                    </div>
                        <div class="col-lg-6" style="display: inline-block;">
                            <div class="main_menu menu_two menu_position">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="index.php">Acasa</a>
                                        </li>
                                        <li class="mega_items">
                                            <a href="vin.php?tip_vin=2">Vin Alb</a>
                                        </li>
                                        <li class="mega_items">
                                            <a href="vin.php?tip_vin=1">Vin Rosu</a>
                                        </li>
                                        <li class="mega_items">
                                            <a href="vin.php?tip_vin=3">Vin Rose</a>
                                        </li>
                                        <li class="mega_items">
                                        <a href="vin.php?tip_vin=4">Vin Spumant</a>
                                        </li>
                                        <li class="mega_items">
                                            <a href="povesteanoastra.php">Povestea Noastra</a>
                                        </li>
                                        <li class="mega_items">
                                            <a href="contact.php">Contact</a>
                                        </li>
                                        <li class="mega_items">
                                            <?php
                                            if(isset($_SESSION['login_user'])) {
                                                echo "<li><a>" . $_SESSION['login_user']['name'] . "</a></li>";
                                                echo "<li><a href='logout.php'>Logout</a></li>";
                                                if($_SESSION['login_user']['is_admin']) {
                                                    echo "<li><a href='edit-vin.php'>Admin</a></li>";
                                                }
                                            } else {
                                                echo "<li><a href='login.php'>Login/Register</a></li>";
                                            }
                                            ?>
                                         </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-4" style="display: inline-block;">
                            <div class="header_top_right">
                                <div class="header_right_info">
                                    <ul>
                                        <li class="search_box">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-search"></i>
                                            </a>
                                            <div class="search_widget">
                                                <form action="#">
                                                    <input type="text" placeholder="Cauta vinul tau...">
                                                    <button type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                        <li class="mini_cart_wrapper">
                                            <a href="#">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            <div class="mini_cart mini_cart2">
                                                <div class="cart_gallery">
                                                    <?php
                                                    foreach ($wishList as $item) {
                                                        echo '<div class="cart_item">';
                                                        echo '<div class="cart_img">';
                                                        echo "<form method='post' action='wishlist.php'>";
                                                        echo '<img src="data:image/png;base64,' . base64_encode($item["product_image"]) . '"/>';
                                                        echo '</div>';
                                                        echo '<div class="cart_info">';
                                                        echo '<span> '. $item['denumire'] .' </span>';
                                                        echo '</div>';
                                                        echo '<input type="hidden" name="delete" value="true"/>';
                                                        echo "<input type='hidden' name='id_vin' value=" . $item['id_vin'] . " />";
                                                        echo '<div class="cart_remove">';
                                                        echo '<button type="submit" class="delete">Șterge</button>';
                                                        echo '</form>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mini_cart_table">
                                                    <div class="cart_table_border">
                                                        <div class="cart_total mt-10">
                                                            <?php if(!sizeof($wishList)) echo "<span class=\"price\">Nu ai niciun favorit :(</span>"?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mini_cart_wrapper">
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <div class="mini_cart mini_cart2">
                                                <div class="cart_gallery">
                                                    <?php
                                                    foreach ($cart as $item) {
                                                        echo '<div class="cart_item">';
                                                            echo '<div class="cart_img">';
                                                            echo "<form method='post' action='cart.php'>";
//                                                            echo '<img src="images/cart1.png" alt="">';
                                                                echo '<img src="data:image/png;base64,' . base64_encode($item["product_image"]) . '"/>';
                                                            echo '</div>';
                                                            echo '<div class="cart_info">';
                                                            echo '<span> '. $item['denumire'] .' </span>';
                                                            echo '<p><span>' . $item['price'] . ' RON</span> X ' . $item['qty'] . '</p>';
                                                            echo '</div>';
                                                            echo '<input type="hidden" name="delete" value="true"/>';
                                                            echo "<input type='hidden' name='id_vin' value=" . $item['id_vin'] . " />";
                                                            echo '<div class="cart_remove">';
                                                            echo '<button type="submit" class="delete">Șterge</button>';
                                                            echo '</form>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    }
                                                ?>
                                                </div>
                                                <div class="mini_cart_table">
                                                    <div class="cart_table_border">
<!--                                                        <div class="cart_total">-->
<!--                                                            <span>Sub Total :</span>-->
<!--                                                            <span class="price">RON 40</span>-->
<!--                                                        </div>-->
                                                        <div class="cart_total mt-10">
                                                            <span>Total :</span>
                                                            <?php echo "<span class=\"price\">RON $total</span>"?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mini_cart_footer">
                                                    <div class="cart_button">
                                                        <a href="checkout.php">Vezi cosul</a>
                                                    </div>            
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header_account">
                                    <ul>
                                        <li class="top_links">
                                            <a href="#">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <ul class="dropdown_links">
                                                <li><a href="#">Contul meu</a></li>
                                                <li><a href="#">Cos de cumparaturi</a></li>
                                                <li><a href="#">Ador</a></li>
                                                <li><a href="login.php">Login/Register</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                             </div>
                        </div>
                     </div>
                </div>
             </div>
        </div>
    </div>
 </header>
<body>
    <!-- mobil size -->
    <div class="off_canvas_overlay"></div>
    <div class="offcanvas_menu offcanvas_two">
        <div class="canvas_open">
            <a href="javascript:void(0)">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="offcanvas_menu_wrapper">
            <div class="canvas_close">
                <a href="javascript:void(0)">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="header_account">
                <ul>
                    <li class="top_links">
                        <a href="#">
                            Contul meu <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown_links">
                            <li><a href="#">Contul meu</a></li>
                            <li><a href="#">Cos de cumparaturi</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="login.php">Login/Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header_right_info">
                <ul>
                    <li class="search_box">
                        <a href="javascript:void(0)">
                            <i class="fa fa-search"></i>
                        </a>
                        <div class="search_widget">
                            <form action="#">
                                <input type="text" placeholder="Cauta vinul tau...">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                    <li class="header_wishlist">
                        <a href="#">
                            <i class="fa fa-heart"></i>
                            <span class="item_count">3</span>
                        </a>
                    </li>
                    <li class="mini_cart_wrapper">
                        <a href="javascript:void(0)">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="item_count">1</span>
                        </a>
                        <div class="mini_cart mini_cart2">
                            <div class="cart_gallery">
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#">
                                            <img src="images/cart1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">
                                            Aurelia Visinescu - Signum 
                                        </a>
                                        <p><span>RON 40</span> X 1</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mini_cart_footer">
                                <div class="cart_button">
                                    <a href="#">Cos de cumparaturi</a>
                                </div>
                                <div class="cart_button">
                                    <a href="#">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div id="menu" class="text-left">
                <ul class="offcanvas_main_menu">
                    <li class="menu-item-has-children active">
                        <a href="index.php" class="active">Acasa</a>
                     </li>
                    <li class="mega_items">
                        <a href="vin.php">Vin Alb</a>
                    </li>
                    <li class="mega_items">
                       <a href="vinrosu.php">Vin Rosu</a>
                    </li>
                    <li class="mega_items">
                       <a href="vinrose.php">Vin Rose</a>
                    </li>
                    <li class="mega_items">
                        <a href="vinspumant.php">Vin Spumnant</a>
                     </li>
                    <li class="mega_items">
                        <a href="povesteanoastra.php">Povestea Noastra</a>
                    </li>
                    <li class="mega_items">
                       <a href="contact.php">Contact</a>
                    </li>
                 </ul>
                <ul class="sub-menu">
                            <?php if($_SESSION['login_user']) {
                                echo "<li><a>" . $_SESSION['login_user']['name'] . "</a></li>";
                                echo "<li><a href='logout.php'>Logout</a></li>";
                            } else {
                                var_dump('else');
                                echo "<li><a href='login.php'>Login/Register</a></li>";
                            }
                            ?>
                        </ul>
                
            </div>

            <div class="offcanvas_footer">
                <span><a href="#"><i class="fa fa-envelope"></i> wine@gmail.com</a></span>
                <ul>
                    <li class="facebook">
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</html>
   