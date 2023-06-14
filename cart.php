<?php
if(session_status() !== 2) {
    session_start();
}
include 'config.php';
// id_selection
// 1 - rosu
// 2 - alb
// 3 - rose
// 4 - spumant
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

    // initialize total with 0 if doesn't exist
    $total = $_SESSION['total'] ?? 0;
    $total += $vin['price'];
    $_SESSION['total'] = $total;
    $found = false;
    // check for existing wine
    // increment qty
    if(isset($_SESSION['shopping_cart'])) {
        foreach($_SESSION['shopping_cart'] as &$item) {
            if($item['id_vin'] !== $vin['id_vin']) continue;
        }
    }
    // when not found, add it to cart
    if(!$found) {
        $_SESSION['shopping_cart'][] = $cart_item;
    }
}

if (isset($_POST['id_vin']) && isset($_POST['delete'])) {
    $id = $_POST['id_vin'];
    $query = "SELECT id_vin, product_image, denumire, price FROM wine where id_vin=$id";
    $result = $conn->query($query);
    $vin = $result->fetch_assoc();
    // check for existing wine
    // decrement total
    $_SESSION['total'] -= $vin['price'];
    foreach($_SESSION['shopping_cart'] as $key => $value) {
        if($value['id_vin'] === $id) unset($_SESSION['shopping_cart'][$key]);
    }

}
