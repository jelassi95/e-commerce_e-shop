<?php
include "inc/functions.php";
$categories = getAllCategories();
if (isset($_GET['id'])){
    $produit = getProduitById($_GET['id']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
  <body>
  <?php
  include "inc/header.php";
  ?>
        <div class="row col-8 offset-2 mt-4">
        <div class="card">
    <img src="images/<?php echo $produit['image'];?>" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><?php echo $produit['nom']?></h5>
        <p class="card-text"><?php echo $produit['description']?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><?php echo $produit['prix']?>$</li>
        <li class="list-group-item">Livraison dès demain</li>
    </ul>
    </div>
      
      </div>
      <!--Footer-->
      <div class=" text-center p-5 mt-4 ">
        <p class="text-black">
        Tous droits réservés © 2023
        </p>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>