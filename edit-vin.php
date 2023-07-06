<?php
require_once 'menu.php';
include 'config.php';
if(session_status() !== 2) {
    session_start();
}

if(!isset($_SESSION['login_user']) && !$_SESSION['login_user']['is_admin']) {
    header("Location: index.php");
}

$sql = "SELECT id_vin, denumire, id_selection, sortiment, price FROM wine";
$result = $conn->query($sql);
$options = [
    1 => 'Roșu',
    2 => 'Alb',
    3 => 'Rose',
    4 => 'Spumant',
];

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
    <section class="no-padding"></section>
    <section class="product-slide" style="margin-top: 125px;">
        <div class="container">
            <table class="table">
            <tr>
                <th scope="col">Denumire</th>
                <th scope="col">Tip</th>
                <th scope="col">Sortiment</th>
                <th scope="col">Pret</th>
                <th scope="col">Acțiune</th>
            </tr>
                <?php
                while($row = $result->fetch_assoc()) {

                ?>
                    <tr>
                        <td>
                            <?php echo $row['denumire']?>
                        </td>
                        <td>
                            <?php echo $options[$row['id_selection']]?>
                        </td>
                        <td>
                            <?php echo $row['sortiment']?>
                        </td>
                        <td>
                            <?php echo $row['price']?>
                        </td>
                        <td>
                            <a style="color: coral;" href="<?php echo 'edit-single.php?id_vin=' . $row['id_vin']?>">Editează</a>
                        </td>
                    </tr>
                <?php
                }?>

        </table>
        </div>
    </section>
    <script src="Dependencies/jquery.min.js"></script>
    <script src="Dependencies/jquery.easing.min.js"></script>
    <script src="Dependencies/bootstrap.min.js"></script>
    <script src="Dependencies/masterslider.min.js"></script>
    <script src="Dependencies/owl.carousel.min.js"></script>
    <script src="main.js"></script>
</body>
</html>