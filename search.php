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
    
    if (isset($_POST['search'])){
        $searchq = $_POST['search'];
        $query = mysqli_query($conn, "SELECT * FROM makanan WHERE namaMakanan LIKE '%$searchq%' ");
        $makanan = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $count = mysqli_num_rows($query);
                            
        if($count == 0){
            echo '
            <h4 align="center" style="color:grey"> There was no search results! </h4>
            ';
        } else {
         //  print_r($makanan);
        };
    }
?>
 <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SAN-PESAN</title>
        <meta name="description" content="Webpage ini menampilkan menu SAN-PESAN">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shorcut icon" type="image/png" href="img/favicon.png">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
        <!-- Main -->
        <br>
        <nav class="navbar navbar-inverse bg-inverse fixed-top">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-1" data-toggle="modal" data-target="#cart">Cart (<span class="total-harga"></span>)</button>
                    <button class="clear-cart btn btn-danger">Clear Cart</button>
                </div>
                <div class="col" align="center" >
                <a href="" class="navbar-brand text-warning font-weight-bold" style="font-family: 'Flamenco', cursive;">SAN-PESAN<span style="margin-left:20px;"><i class="fa fa-phone text-white"></i><span style="color:white; letter-spacing:2px; margin-left:2px;font-family: 'Ubuntu', sans-serif;
">0811-2233-4455</span></a>
                </div>
                <div class="col">
                    <ul class="menu" id="navigation">
                        <li><a href= index.php >Menu</a></li>
                        <li><a href= pesanan.php>Pesanan</a></li>
                    </ul>
                </div>
            </div>
            <div class = "row">
                <div class ="col text-center">
                    <form method="post" action="search.php">
                        <input type = "text" id="myinput" name= "search" placeholder= "Search Menu">
                    </form>
                </div>
            </div>
        </nav>
    </br>
        <div class="container">
            <div class="row">
                <!-- <div class="col"> -->
                <?php
                    foreach($makanan as $item){
                        echo '
                        <div class="col">
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" id="fb-img" src='.$item['img'].' alt="Card image cap">
                                <div class="card-block">
                                    <h4 class="card-title" id="menu-name">'.$item['namaMakanan'].'</h4>
                                    <p class="card-text" id="price">Price: Rp '.$item['harga'].'</p>
                                    <a href="#" id="pesan-menu" data-name='.$item['namaMakanan'].' data-price='.$item['harga'].' data-id= '.$item['idMakanan'].' class="add-to-cart btn btn-primary">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        ';
                    };
                ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     <input type="text" class="form-control" name="nomor" placeholder="input nomor meja" aria-label="noMeja" aria-describedby="basic-addon1">
                    <table class="show-cart table">
                    </table>
                    <div>Total price: Rp<span class="total-cart"></span></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="order-now btn btn-primary" id="order-now" >Order now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src="./script.js"></script>

    </body>

</html>
