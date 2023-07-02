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

    $found = false;
    // check if it is in wishlist
    if(isset($_SESSION['wish_list'])) {
        foreach($_SESSION['wish_list'] as &$item) {
            if($item['id_vin'] !== $vin['id_vin']) continue;
            $found = true;
        }
    }
    // not found, add
    if(!$found) {
        $_SESSION['wish_list'][] = $cart_item;
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
    foreach($_SESSION['wish_list'] as $key => $value) {
        if($value['id_vin'] !== $id) continue;
        // delete from cart
        unset($_SESSION['wish_list'][$key]);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
