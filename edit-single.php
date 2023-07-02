<?php
require_once 'menu.php';
include 'config.php';
if(session_status() !== 2) {
    session_start();
}

if(!isset($_SESSION['login_user']) && !$_SESSION['login_user']['is_admin']) {
    header("Location: index.php");
}

$options = [
    1 => 'Roșu',
    2 => 'Alb',
    3 => 'Rose',
    4 => 'Spumant',
];
$vin = null;
if(isset($_GET['id_vin'])) {
    $id = $_GET['id_vin'];
    // find wine
    $sql = "SELECT id_vin, denumire, id_selection, sortiment, price FROM wine where id_vin=$id";
    $result = $conn->query($sql);
    $vin = $result->fetch_assoc();
}

if(isset($_POST['id_vin'])) {
    $id = $_POST['id_vin'];
    $denumire = $_POST['denumire'];
    $id_selection = $_POST['id_selection'];
    $sortiment = $_POST['sortiment'];
    $price = $_POST['price'];

    $sql = "UPDATE wine SET 
                denumire = '$denumire', 
                id_selection = $id_selection, 
                sortiment = '$sortiment', 
                price = $price 
            where id_vin=$id";
    // run update
    $result = $conn->query($sql);
}

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
</head>
<body>
    <?php 
        include_once 'header.php';
    ?>
    <section class="product-slide" style="margin-top: 125px;">
        <div class="container">
            <?php if($vin) {?>
                <form method="POST" action="">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $vin['id_vin'] ?>" id="id_vin" name="id_vin">
                        <label for="denumire">Denumire</label>
                        <input type="text" class="form-control" value="<?php echo $vin['denumire'] ?>" id="denumire" name="denumire">
                        <?php
                        $html = '<label for="id_selection">Tip vin</label><select class="form-control" id="id_selection" name="id_selection">';
                            foreach ($options as $option => $value) {
                                if ($option == $vin['id_selection']) {
                                    $html .= '<option value='.$option.' selected="selected">'.$value.'</option>';
                                } else {
                                    $html .= '<option value='.$option.'>'.$value.'</option>';
                                }
                            }
                            echo $html .= '</select>';
                        ?>
                        <label for="sortiment">Sortiment</label>
                        <input type="text" class="form-control" value="<?php echo $vin['sortiment'] ?>" id="sortiment" name="sortiment">

                        <label for="price">Preț</label>
                        <input type="text" class="form-control" value="<?php echo $vin['price'] ?>" id="price" name="price">

                        <input type="submit" class="btn btn-primary"/>
                    </div>
                </form>
            <?php }
            ?>
            </form>

        </div>
    </section>
    <script src="Dependencies/jquery.min.js"></script>
    <script src="Dependencies/jquery.easing.min.js"></script>
    <script src="Dependencies/bootstrap.min.js"></script>
    <script src="Dependencies/masterslider.min.js"></script>
    <script src="Dependencies/owl.carousel.min.js"></script>
    <script src="main.js"></script>
</body>
<?php
    include_once 'footer.php';
?>
</html>