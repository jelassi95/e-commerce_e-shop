<?php
session_start();
if(isset($_SESSION['nom'])){
  header('location:profil.php');
}
include "inc/functions.php";
$user = true;
$categories = getAllCategories();
if(!empty($_POST)){ //clicque sur bouton sauvgarder

 $user = ConnectVisiteur($_POST);
 if (is_array($user) && count($user) > 0 ) { // utilisateur connectée
  Session_start();
  $_SESSION['email'] = $user['email'];
  $_SESSION['nom'] = $user['nom'];
  $_SESSION['prenom'] = $user['prenom'];
  $_SESSION['mp'] = $user['mp'];
  $_SESSION['telephone'] = $user['telephone'];
  header('location:profil.php');

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
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
            <h1> Connexion</h1>
            <form action="connexion.php" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="pwd"> Mot de passe</label>
                    <input type="password" name="mp" class="form-control" id="pwd" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-left">Connecter</button>
                </div>
            </form>
        </div>
    </div>

      <!--Footer
      <div class=" text-center">
        <p class="text-black">
          tous droits réservés © 
        </p>
      </div>-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>
     
     <?php 
      if (!$user){
        print "
        <script>
        Swal.fire({
         title: 'Erreur',
         text: 'Cordonnées non valide',
         icon: 'error',
         confirmButtonText: 'ok',
         timer:2000
         }) 
         </script>
        ";
      }
  
     ?>
    </body>
</html>