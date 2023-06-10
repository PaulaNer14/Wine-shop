<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
    $Telefon = $_POST["Telefon"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
        $id_client = rand(10, 100);


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