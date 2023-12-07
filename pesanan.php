<!DOCTYPE html>
<html>

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
        // echo "Connected successfully"; 
        // isipesanan: idPesanan, idMakanan, quantity
        // pesanan: idPesanan, totalHarga, noMeja, tanggalPembelian
        // makanan: idMakanan, jenisMakanan, namaMakanan, harga, status, img
        $sql = 'SELECT idPesanan, noMeja, sudahdibayar FROM pesanan';
        $result = mysqli_query($conn, $sql); 
        $pesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $sql = 'SELECT pesanan.idPesanan, namaMakanan FROM isipesanan, makanan, pesanan WHERE pesanan.idPesanan=isipesanan.idPesanan and isipesanan.idMakanan=makanan.idMakanan ORDER BY pesanan.idPesanan';
        $result = mysqli_query($conn, $sql);
        $makanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SAN-PESAN</title>
        <meta name="description" content="Webpage ini menampilkan menu SAN-PESAN">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shorcut icon" type="image/png" href="img/favicon.png">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
        <nav class="navbar navbar-inverse bg-inverse fixed-top">
            <div class="row">
                <div class="col">

                </div>
                <div class = "col" align = "center">
                <a href="" class="navbar-brand text-warning font-weight-bold" style="font-family: 'Flamenco', cursive;">SAN-PESAN<span style="margin-left:20px;"><i class="fa fa-phone text-white"></i><span style="color:white; letter-spacing:2px; margin-left:2px;font-family: 'Ubuntu', sans-serif;
">0811-2233-4455</span></a>
                </div>
                <div class = "col">  
                    <ul class = "menu" id ="navigation"> 
                    <li><a href = index.php>Menu</a></li>
                    <li><a href = pesanan.php>Pesanan</a></li>
                    </ul>
                </div>  
            </div> 
        </nav>

        <!-- Main -->
        <div class="container">
            <div class="row">
                <?php

                    foreach($pesanan as $psn){
                        if ($psn['sudahdibayar']==0){
                        echo '
                        <div class="col">
                                <div class="card" style="width: 20rem;">
                                    <div class="card-block">
                                    <h4 class="card-title" id="id-pesanan">ID Pesanan '.$psn['idPesanan'].'</h4>
                                    <h4 class="card-title" id="no-meja">No Meja '.$psn['noMeja'].'</h4><br/> 
                        '; 
                        foreach($makanan as $item){
                            if ($psn['idPesanan']==$item['idPesanan']) {
                                echo '
                                    <p class="card-text" id="menu-name"> '.$item['namaMakanan'].' </p>
                                ';
                            }; 
                        };

                        // CHECKBOX SELESAI DIMASAK
                        echo ' 
                            <br/><form action="#" method="post">
                            <p>Status makanan</p>
                            <input type="checkbox" onclick="this.form.submit()" name="masak"
                        ';
                            if(isset($_POST['masak']) and $_POST['masak']==$psn['idPesanan']) {echo 'checked="checked"';}  
                        echo '
                            value = '.$psn['idPesanan'].'><label>Selesai dimasak</label><br/>
                        ';
                        if (isset($_POST['masak'])) {
                            $query = mysqli_query($conn, "UPDATE pesanan SET selesaidimasak = '1' WHERE pesanan.idPesanan='".$_POST['masak']."' ");
                        }

                        // CHECKBOX SELESAI DIANTAR
                        echo '
                            <input type="checkbox" onclick="this.form.submit()" name="antar"
                        ';
                            if(isset($_POST['antar']) and $_POST['antar']==$psn['idPesanan']) {echo 'checked="checked"';}  
                        echo '
                            value = '.$psn['idPesanan'].'><label>Selesai diantar</label><br/>
                        ';
                        if (isset($_POST['antar'])) {
                            $query = mysqli_query($conn, "UPDATE pesanan SET selesaidiantar = '1' WHERE pesanan.idPesanan='".$_POST['antar']."' ");  
                        }

                        // CHECKBOX SELESAI DIBAYAR
                        echo '
                            <input type="checkbox" onclick="this.form.submit()" name="bayar"
                        ';
                            if(isset($_POST['bayar']) and $_POST['bayar']==$psn['idPesanan']) {echo 'checked="checked"';}  
                        echo '
                            value = '.$psn['idPesanan'].'><label>Selesai dibayar</label><br/>
                        ';
                        if (isset($_POST['bayar'])) {
                            $query = mysqli_query($conn, "UPDATE pesanan SET sudahdibayar = '1' WHERE pesanan.idPesanan='".$_POST['bayar']."' ");
                        }
                        echo '
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ';
                        };
                    };
                ?>               
            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src="./script.js"></script>
    </body>
</html>
