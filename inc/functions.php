<?php 

function connect(){
// 1 - connexion vers la BD
$servername="localhost";
$DBuser= "root";
$DBpassword= "";
$DBname= "ecommerce";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

return $conn;
}

function getAllCategories(){

$conn = connect();
// 2 - creation de la requette

$requette = "SELECT * FROM categories";

//3 - execution dela requette

$resultat= $conn->query($requette);

//4 - resultat de la requette

$categories = $resultat->fetchAll();
//var_dump($categories);

return $categories;
}



function getAllProducts(){
  $conn = connect();

  // 2 - creation de la requette
  
  $requette = "SELECT * FROM produit";
  
  //3 - execution dela requette
  
  $resultat= $conn->query($requette);
  
  //4 - resultat de la requette
  
  $produits = $resultat->fetchAll();
  //var_dump($categories);
  
  return $produits;
  }
 
function searchProduits ($Keywords) {
  $conn = connect();

// 2 - creation de la requette

$requette = "SELECT * FROM produit WHERE nom LIKE '%$Keywords%'";

//3- execution de la requette
$resultat = $conn->query($requette);
//4- resultat 
$produit = $resultat->fetchALL();
return $produit;
}


function getProduitById($id){
//1- connexion
$conn = connect();
//2- ceartion de la requette
$requette = "SELECT * FROM produit WHERE id=$id";
//3- execution de la requette
$resultat = $conn->query($requette);
//4- resultat 
$produit = $resultat->fetch();
return $produit;

}

function AddVisiteur($data){
  $conn = connect();

  $requette = "INSERT INTO visiteur(nom,prenom,email,mp,telephone) VALUES ('".$data['nom']."','".$data['prenom']."', '".$data['email']."','".$data['mp']."','".$data['telephone']."')";

  $resultat = $conn->query($requette);
  
  if($resultat){
    return true;
  }else{
    return false;
  }

}


function ConnectVisiteur($data){
  $conn = connect();
  $email = $data['email'];
  $mp = $data['mp'];
  $requette = "SELECT * FROM visiteur WHERE email='$email' AND mp='$mp'";
  $resultat = $conn->query($requette);
$user = $resultat->fetch();
return $user;

}



function ConnectAdmin($data){
  $conn = connect();
  $email = $data['email'];
  $mp = $data['mp'];
  $requette = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
  $resultat = $conn->query($requette);
$user = $resultat->fetch();
return $user;

}
?>