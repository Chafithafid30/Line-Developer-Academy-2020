<?php
    //connect ke database
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "kobeku";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $data       = $_POST['data1']; // put the contents of the file into a variable 
    json_encode($data);
    $data_array = json_decode($data, true); // Convert JSON string into PHP array format
    
    $noMeja = $_POST['noMeja1'];

    $query = '';
    $query = "INSERT INTO pesanan (noMeja) VALUES ('.$noMeja.')";
    $result    = mysqli_query($conn, $query);
    
    $sql       = 'SELECT idPesanan FROM pesanan WHERE noMeja=('.$noMeja.') AND sudahdibayar=0';
    $result    = mysqli_query($conn, $sql);
    $arridpesanan = mysqli_fetch_array($result);
    $idpesanan = $arridpesanan['idPesanan'];
    
    function getIdMakanan(string $namaMakanan)
    {
        $sql2      = 'SELECT idMakanan FROM makanan WHERE namaMakanan= "'.$namaMakanan.'";';
        $result2   = mysqli_query($GLOBALS['conn'], $sql2);
        $arridmakanan = mysqli_fetch_array($result2, MYSQLI_ASSOC);
       
        $value = $arridmakanan['idMakanan'];

        return $value;
    }

    foreach ($data_array as $row) {
        $query2 = '';
        //Build multiple insert query 
        $idM = getIdMakanan($row['name']);
        // var_dump($idM);
        $query2 = "INSERT INTO isipesanan (idPesanan, idMakanan, quantity) VALUES ($idpesanan, $idM, '" . $row['count'] . "');";
        // var_dump($query2);
        $result    = mysqli_query($conn, $query2);
    }

?>
