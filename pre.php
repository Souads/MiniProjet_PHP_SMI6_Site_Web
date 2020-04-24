<?php 
session_start();
 // header("Refresh:3");
?>
 <!DOCTYPE html>
<html>
<head>
  <title> Online Shoping For Hoodies</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<style>
.login {text-align:right;
 position:relative;bottom:40px;right:15px;  
   font-size: 110%;
   
 }
 span { color:black;
        letter-spacing: 10px;
         text-shadow: 12px 10px #8B0000;
         font-family: "Times New Roman", Times, serif;
          font-variant: small-caps;
          font-size: 400%;
          padding-left: 15%;
          }
          a:active{background-color:grey;}
.menu {   text-align:right;max-width:300px;}
.menu a {
   color: blue;    
   padding: 10%;
   font-size: 110%;
   text-decoration:none;
   padding-top:5px;
   
}
.home{position:relative;left:400px;top:-15px;margin:0px;}
.produits{position:relative;left:570px;bottom:15px;}
.commantaire{position:relative;left:800px;bottom:35px;}

 a:hover{color:red;background-color:#ADD8E6;border-radius: 20px 20px 0px 0px;}
 body{ 
     background-image: linear-gradient(to bottom right,#ADD8E6,#F08080 ); 
}
</style>
<body onunload= " Opener.location.reload ()">
  <span >Hoodies</span>
	<div class="login">
    <?php if(isset($_SESSION['nom'])){ ?>
     <?php echo "Bienvenu, ".$_SESSION['nom']." ".$_SESSION['prenom']; ?><br>
     <a  href="logout.php" style="text-decoration:none" >Se Deconnecter</a>
     <style>
           .home{position:relative;left:400px;top:-27px;margin:0px;}
           .produits{position:relative;left:570px;bottom:27px;}
           .commantaire{position:relative;left:800px;bottom:47px;}
     </style>
    <?php }else{ ?>
      <a href="inscrire.php" target="B"> S'inscrire | </a>
      <a href="identifier.php" target="B"> S'identifier </a>
   <?php } ?>
     <a href="panier.php" target="B"  ><i  data-count="3" class="fas fa-shopping-cart"  style="font-size:30px;color:white"></i></a>
    
  </div>
  <div class="menu">
    <a href="Home.php" target="B" class="home">Home</a>
    <a href="produits.php" target="B" class="produits">Produits</a>
    <a  href="commentaire.php" target="B" class="commantaire"> Commentaires</a>
  </div>
  </body>
</html>