<?php
include 'config.php';
if(session_status() !== 2) {
    session_start();
}

$cart = $_SESSION['shopping_cart'] ?? [];
$total = $_SESSION['total'] ?? 0;
$qty = 0;
foreach($cart as $item) {
    $qty += $item['qty'];
}
if(isset($_POST['order'])) {
    var_dump($_POST);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $judet = $_POST['judet'];
    $oras = $_POST['oras'];
    $nume_strada = $_POST['nume_strada'];
    $numar = $_POST['numar'];
    $bloc = $_POST['bloc'];
    $scara = $_POST['scara'];

    $id_payment_method = $_POST['id_payment_method'];
    $sql = "INSERT INTO adress(judet, oras, nume_strada, numar, bloc, scara) values ('$judet', '$oras', '$nume_strada', '$numar', '$bloc', '$scara')";
    $result = $conn->query($sql);
    $adress_id = $conn->insert_id;

    $id = $_SESSION['login_user'] ? $_SESSION['login_user']['id'] : null;
    $sql = "INSERT INTO orders(id_client, adress_id, firstname, lastname, email, id_payment_method, total) values ($id, $adress_id,'$firstname', '$lastname', '$email', $id_payment_method, $total)";
    $result = $conn->query($sql);
    $order = $conn->insert_id;

    foreach($cart as $item) {
        $id_vin = $item['id_vin'];
        $qty = $item['qty'];
        $price = $item['price'];
        $sql = "INSERT INTO orders_wine(order_id, id_vin, qty, price) values ($order, $id_vin, $qty, $price)";
        $result = $conn->query($sql);
    }

    unset($_SESSION['shopping_cart']);
    unset($_SESSION['total']);
    header("Location: index.php");
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
            <div class="py-5 text-center">
                <h2>Checkout</h2>
                <p class="lead">Text text</p>
            </div>
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Coșul tău</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $qty?></span>
                    </h4>
                    <ul class="list-group mb-3 sticky-top">
                        <?php foreach($cart as $item) { ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <small class="text-muted"><?php echo $item['denumire'] ?></small>
                                </div>
                                <span class="text-muted"> <?php echo
                                        $item['price'] . ' X ' . $item['qty'] . ' = ' . $item['qty']*$item['price']?>
                                </span>
                            </li>
                        <?php }?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (RON)</span>
                            <strong><?php echo $total?></strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" method="post" action="">
                        <div class="row">
                            <?php if(isset($_SESSION['login_user'])) {
                                $id = $_SESSION['login_user']['id'];
                                $sql = "SELECT firstname, lastname from client where id_client=$id";
                                $result = $conn->query($sql);
                                $client = $result->fetch_assoc();
                            } ?>
                            <div class="col-md-6 mb-3">
                                <label for="firstname">Nume</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" value="<?php echo $client ? $client['firstname'] : '' ?>" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastname">Prenume</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" value="<?php echo $client ? $client['lastname'] : '' ?>" required="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="judet">Județ</label>
                            <input type="text" class="form-control" name="judet" id="judet" placeholder="Sibiu" required="">
                        </div>
                        <div class="mb-3">
                            <label for="oras">Oraș</label>
                            <input type="text" class="form-control" name="oras" id="oras" placeholder="Medias" required="">
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="nume_strada">Stradă</label>
                                <input type="text" class="form-control" name="nume_strada" id="nume_strada" placeholder="Sebesului" required="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="numar">Număr</label>
                                <input type="text" class="form-control" name="numar" id="numar" placeholder="6" required="">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="bloc">Bloc<span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" name="bloc" id="bloc" placeholder="30">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="scara">Scară<span class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" name="scara" id="scara" placeholder="A">
                            </div>
                        </div>
                        <hr class="mb-4">
                        <h4 class="mb-3">Plată</h4>
                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <label for="id_payment_method">Cash/Card</label>
                                <select class="form-control" id="id_payment_method" name="id_payment_method">
                                    <option value='1' selected="selected">Card</option>
                                    <option value='2'>Cash</option>
                                </select>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Trimite comanda</button>
                        <input type="hidden" name="order" value="true">
                    </form>
                </div>
            </div>
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