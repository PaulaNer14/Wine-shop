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

    // only process requests once
    if (isset($_SESSION['form_token'])
        && $_POST['form_token'] == $_SESSION['form_token']) {
        return;
    }
    // new request, save
    $_SESSION['form_token'] = $_POST['form_token'];

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

    $total = $total + $vin['price'];

    $_SESSION['total'] = $total;
    $found = false;
    // check for existing wine
    // increment qty
    if(isset($_SESSION['shopping_cart'])) {
        foreach($_SESSION['shopping_cart'] as &$item) {
            if($item['id_vin'] !== $vin['id_vin']) continue;
            $item['qty']++;
            $found = true;
        }
    }
    // when not found, add it to cart
    if(!$found) {
        $_SESSION['shopping_cart'][] = $cart_item;
    }
    // go back
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['id_vin']) && isset($_POST['delete'])) {
    $id = $_POST['id_vin'];
    $query = "SELECT id_vin, product_image, denumire, price FROM wine where id_vin=$id";
    $result = $conn->query($query);
    $vin = $result->fetch_assoc();
    // check for existing wine
    // decrement total
    $subtractPrice = 0;
    foreach($_SESSION['shopping_cart'] as $key => $value) {
        if($value['id_vin'] !== $id) continue;
        // decrement price * qty
        $subtractPrice = $vin['price'] * $value['qty'];
        // delete from cart
        unset($_SESSION['shopping_cart'][$key]);
    }
    $_SESSION['total'] -= $subtractPrice;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
