<?php

    //connect ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "kobeku";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = 'SELECT namaMakanan, harga FROM makanan';

    $result = mysqli_query($conn, $sql);

    $makanan = mysqli_fetch_all($result, MYSQLI_ASSOC);

    print_r($makanan);
?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    <?php include('templates/footer.php'); ?>

</html>
