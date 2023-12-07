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
    $sql = 'SELECT idMakanan,namaMakanan, harga, img FROM makanan';
    $result = mysqli_query($conn, $sql);
    $makanan = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SAN-PESAN</title>
        <meta name="description" content="Webpage ini menampilkan menu KOBE">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shorcut icon" type="image/png" href="img/favicon.png">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./style.css">

        <style type="text/css">

.bgimg{
background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('filkom.jpg');
background-size:100% 100%;
background-attachment:fixed;
width:100%;
height:660px;
}

.hearderset{
	    padding-top:250px;
	    box-sizing:border-box;
     }

        .hearderset h2{
	    font-size:42px;
     }

        .hearderset h1{
	    font-size:62px;
	    font-weight:bold;
    }

    
    .footer{
	    height:85px;
	    background:brown;
	    width:auto;
	    padding:20px 0;
	    color:white;
	    text-align:center;
      }

        .footer h6{
	    line-height:50px;
      }

        .footer i{
	    color:white;
	    margin-left:20px;
      }
</style>
    </head>

    <body>
        <!-- Main -->

        <br>
        <div class="bgimg" id="home">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
						<span class="navbar-toggler-icon "> </span>
					</button>
				</div>
			</nav>
			
			<div class="container text-center hearderset text-white">
	            <h1 style="font-family: 'Flamenco', cursive;">ORDER FOOD AT CANTEEN <span class="colorchange">VIA ONLINE</span></h1>
			    </div>
		    </div>
	    </div>
    </div>
</div>

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

          <!--Konten LIFF v2-->
 
          <div id="liffAppContent">
            <!-- ACTION BUTTONS -->
            <div class="buttonGroup">
                <div class="buttonRow">
                    <button id="openWindowButton" class="btn btn-success btn-small">Open External Window</button>
                    <button id="closeWindowButton" class="btn btn-danger btn-small">Close LIFF App</button>
                    <button id="sendMessageButton" class="btn btn-warning btn-small">Send Message</button>
                </div>
 
            </div>
 
            <!-- LIFF DATA -->
            <div id="liffData">
                <h3 id="liffDataHeader" class="textLeft">Informasi:</h3>
                <table>
                    <tr>
                        <th>isInClient : </th>
                        <td id="isInClient" class="textLeft"></td>
                    </tr>
                    <tr>
                        <th>isLoggedIn : </th>
                        <td id="isLoggedIn" class="textLeft"></td>
                    </tr>
                </table>
            </div>
            <!-- LOGIN LOGOUT BUTTONS -->
            <div class="buttonGroup">
                <button id="liffLoginButton" class="btn btn-success btn-small">Log in</button>
                <button id="liffLogoutButton" class="btn btn-warning btn-small">Log out</button>
            </div>
            <div id="statusMessage">
                <div id="isInClientMessage"></div>
                <div id="apiReferenceMessage">
                </div>
            </div>
        </div>
        <!-- LIFF ID ERROR -->
        <div id="liffIdErrorMessage" class="hidden">
            <code id="code-block">
            </code>
        </div>
        <!-- LIFF INIT ERROR -->
        <div id="liffInitErrorMessage" class="hidden">
        </div>
        <!-- NODE.JS LIFF ID ERROR -->
        <div id="nodeLiffIdErrorMessage" class="hidden">
        </div>


        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script src="./script.js"></script>

        <div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15805.69195411084!2d112.60669457424133!3d-7.955164758321364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788279820198e5%3A0x6e6adf1e05f594ce!2sKantin%20Fakultas%20Ilmu%20Komputer%20Universitas%20Brawijaya!5e0!3m2!1sen!2sin!4v1605073992488!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<!-- ///////////////////////////footer///////////////////////////////// -->
		<footer class="footer">
			<h6 class="text-center">Copyright © 2020 SAN-PESAN
		</footer>
    </body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function(){
            $('#popupmain').css('display','block');
        },3000);
    });

    $('.submitId').click(function(){
        $('#popupmain').css('display','none');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

<script>
    var type = new Typed('#typed',{
        stringsElement: '#typed-strings',
        typeSpeed: 200,
        backSpeed: 20,
        loop: true,
        loopCount:100,
        showCursor:false
    });
</script>
</html>
