<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
    $Telefon = $_POST["Telefon"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    // get last id, increment
    $maxIdSql = 'select max(id_client) as id from client;';
    $result = mysqli_query($conn, $maxIdSql);
    $id_client = (int)mysqli_fetch_assoc($result)['id'] + 1;

    // Insert the new user into the database
    $sql = "INSERT INTO client (id_client, firstName, lastName, Telefon, email, password)
    VALUES ('$id_client', '$firstName', '$lastName', '$Telefon', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location:index.php");
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
            echo "Something went wrong, please review the information added and try again";
    }

    $conn->close();
}
?>