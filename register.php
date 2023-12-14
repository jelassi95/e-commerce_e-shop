<?php
session_start();
if(isset($_SESSION['nom'])){
  header('location:profil.php');
}
include "inc/functions.php";
$showRegestrationAlert = 0;
$categories = getAllCategories();
if(!empty($_POST)){ //clicque sur bouton sauvgarder

 if (AddVisiteur($_POST)){
  $showRegestrationAlert =1;
 }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
  <body>
  <?php
  include "inc/header.php";
  ?>
      <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1> Register</h1>
            <form action="register.php" method="post"> 
                <div class="form-group">
                    <label for="username">Nom</label>
                    <input name="nom" type="text" class="form-control" id="username" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="username">Prenom</label>
                    <input name="prenom"type="text" class="form-control" id="prenom" placeholder="Prenom">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input name="telephone" type="text" class="form-control" id="telephone" placeholder="Telephone">
                </div>
                <div class="form-group">
                    <label for="pwd"> Mot de passe</label>
                    <input name="mp"  type="password" class="form-control" id="pwd" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-left">Sauvgarder</button>
                </div>
            </form>
        </div>
    </div>

      <!--Footer
      <div class=" text-center p-5 mt-4 ">
        <p class="text-black">
          tous droits réservés © 2023
        </p>
      </div>-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>
     
     <?php 
      if ($showRegestrationAlert ==1){
        print "
        <script>
        Swal.fire({
         title: 'Success!',
         text: 'Creation de compte avec succées',
         icon: 'success',
         confirmButtonText: 'ok'
         }) 
         </script>
        ";
      }
  
     ?>
    </body>
</html>