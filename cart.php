
<?php
session_start();
include 'config.php';
// id_selection
// 1 - rosu
// 2 - alb
// 3 - rose
// 4 - spumant
var_dump(session_status());
var_dump($_SESSION['shopping_cart']);
if (isset($_POST['id_vin']) && isset($_POST['add'])) {
    $id = $_POST['id_vin'];
    $query = "SELECT id_vin, product_image, denumire, price FROM wine where id_vin=$id";
    $result = $conn->query($query);
    $vin = $result->fetch_assoc();
    $cart_item = [
        'id_vin' => $vin['id_vin'],
        'product_image' => $vin['product_image'],
        'denumire' => $vin['denumire'],
        'price' => $vin['price'],
        'qty' => 1,
    ];

//    $_SESSION['shopping_cart'][] = $cart_item;
    // check for existing wine
    // increment qty
    $total = $_SESSION['total'] ?? 0;
    $total += $vin['price'];
    $found = false;
    if(isset($_SESSION['shopping_cart'])) {
        foreach($_SESSION['shopping_cart'] as &$item) {
            if($item['id_vin'] !== $vin['id_vin']) continue;
        }
    }
    if(!$found) {
        $_SESSION['shopping_cart'][] = $cart_item;
    }
}

if (isset($_POST['id_vin']) && isset($_POST['delete'])) {
    $id = $_POST['id_vin'];
    $query = "SELECT id_vin, product_image, denumire, price FROM wine where id_vin=$id";
    $result = $conn->query($query);
    $vin = $result->fetch_assoc();
    $cart_item = [
        'id_vin' => $vin['id_vin'],
        'product_image' => $vin['product_image'],
        'denumire' => $vin['denumire'],
        'price' => $vin['price'],
        'qty' => 1,
    ];

//    $_SESSION['shopping_cart'][] = $cart_item;
    // check for existing wine
    // increment qty
    $total = $_SESSION['total'] ?? 0;
    $total += $vin['price'];
    $found = false;
    if(isset($_SESSION['shopping_cart'])) {
        foreach($_SESSION['shopping_cart'] as &$item) {
            if($item['id_vin'] !== $vin['id_vin']) continue;
            $item['qty']--;
            if($item)
            $found = true;
        }
    }
    if(!$found) {
        $_SESSION['shopping_cart'][] = $cart_item;
    }
    var_dump($_SESSION['shopping_cart']);
}
