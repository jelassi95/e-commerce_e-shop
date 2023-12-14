<?php
session_start();
include "inc/functions.php";
$categories = getAllCategories();


if (!empty($_POST)){ //button search clicked

  //echo " button search clicked";
  //echo $_POST['search'];
  $produits = searchProduits($_POST['search']);
}else{
$produits = getAllProducts();
}

?>
<!doctype html>
<html lang="en">
  <head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'><link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<style>
  .carousel-inner {
	width: 100%;
	display: inline-block;
	position: relative;
}
.carousel-inner {
	padding-top: 43.25%;
	display: block;
	content: "";
}
.carousel-item {
	position: absolute;
	top: 0;
	bottom: 0;
	right: 0;
	left: 0;
	background: skyblue;
	background: no-repeat center center scroll;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

.caption {
	position: absolute;
	top: 50%;
	left: 50%;
  transform: translateX(-50%) translateY(-50%);
	width: 60%;
	z-index: 9;
	margin-top: 20px;
	text-align: center;
}
.caption h1 {
  color: #fff;
	font-size: 52px;
	font-weight: 700;
	margin-bottom: 23px;
}
.caption h2 {
  color: rgba(255,255,255,.75);
	font-size: 26px;
	font-weight: 300;
}
a.big-button {
	color: #fff;
	font-size: 19px;
	font-weight: 700;
	text-transform: uppercase;
	background: #eb7a00;
	background: rgba(255, 0, 0, 0.75);
	padding: 28px 35px;
	border-radius: 3px;
	margin-top: 80px;
	margin-bottom: 0;
	display: inline-block;
}

a.view-demo {
	color: #fff;
	font-size: 21px;
	font-weight: 700;
	display: inline-block;
	margin-top: 35px;
}
a.view-demo:hover {
	text-decoration: none;
	color: #333;
}

.carousel-indicators .active {
  background: #fff;
}
.carousel-indicators li {
  background: rgba(255, 255, 255, 0.4);
  border-top: 20px solid;
  z-index: 15;
}
.btn-success:hover {
  background-color: #f8b728;
  border-color:#f8b728;
 
}
h1 {
  font-family: "Sofia", sans-serif;
  font-size: 52px;
  font-weight: 700;
  margin-bottom: 23px;
  position: relative;
}
h1::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); 
  z-index: -1; 
}
.btn-success {
  font-family: "Sofia", sans-serif;
  font-size: 16px; 
  padding: 10px 20px;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
@media (max-width: 767px) {
    .caption button.btn-success {
        margin-top: 10px; 
        margin-bottom: 10px;
    }
}

</style>

</head>
  <body>
  <?php
  include "inc/header.php";
  ?>
     <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          
          <div class="carousel-item active" style="background-image: url('images/cover1.jpg'); background-size: cover;">
            <div class="caption">
              <h1>Préparez vos cadeaux</h1>
              <button type="button" class="btn btn-success my-2">Découvrir</button>
            </div>
          </div>
    
          <div class="carousel-item" style=" background-image: url('images/cover2.jpg'); background-size: cover;">
            <div class="caption">
              <h1>Collection des fêtes</h1>
              <button type="button" class="btn btn-success my-2">Découvrir</button>
            </div>
          </div>
        </div>
        
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container">
    <div class="row">
        <?php foreach ($produits as $produit): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card" style="width: 100%;">
                    <img src="images/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $produit['nom']; ?></h5>
                        <p class="card-text"><?php echo $produit['description']; ?></p>
                        <a href="produit.php?id=<?php echo $produit['id']; ?>" class="btn btn-primary">Afficher</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


   <?php include "inc/footer.php"; ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>