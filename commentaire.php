<?php
session_start();
   if (isset($_POST['envoi']))
     {     if(isset($_SESSION['id_client'])){
         $_SESSION['Commentaire']=$_POST['coo'];
         $nom=$_SESSION['nom']." ".$_SESSION['prenom'];
               
      try{
          $connect=new PDO('mysql:host=localhost;dbname=id12823799_souad','id12823799_shopinghoodies','@SouadQwE126');
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->exec("INSERT INTO Commentaires (id_comm,id_c,Commentaire) VALUES (NULL,'$nom','".$_SESSION['Commentaire']."')");
      } catch(PDOException $e) {    echo  $e->getMessage();}
      $connect= null;
        } 
    
      else{
            header("location:identifier.php");
          }
      }
          
      
     
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	body {
  		background-image: linear-gradient(to bottom right,#F8F8FF,#F0FFFF );
  		   overflow-x: hidden;
  	}
	input{color:black;border-radius:10px; border-style: inset; width:70px;height: 30px;position: relative;left: 500px ;background-color: #4CAF50;}
	input[type=email]{background-color:white;}
	#comm{position: relative;left:380px;top:50px;}
	#fg{width: ;height:700px;}


footer{ 
background-color: #708090;
width: 1350PX;
height: 340px;
position:relative;
top: 250px;
color: white;
  	font-size: 20px;
  }
	#colum a{
color: white;
padding: 15px;
display: inline-block;
font-family: cursive;
position: relative;
left: 100px;
top: 30px;
 } 
  #contact{
color: white;
font-family: cursive;
position: relative;
left: 1000px;
bottom : 130px;
height: 10px;

 }#contact input ,textarea {
 border-radius: 14px; padding: 6px;
 	webkit-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.2);	
 }
 #follow{height: 10px; position: relative;bottom: 100px; left: 600px; font-family: cursive;}
 #follow img{
 	width: 50px;
 	height: 50px;
position: relative;
top: 4px;
 
 }#email{
 	position: relative;
 	left: 5px;
 	width: 175px;
 	padding: 29px;
 }
 #send{
 	position: relative;
 	left: 260px;
 	border-radius: 1px;
 	width: 60px;
 }

</style>
<body >

<div id="comm">
    <form action="" method="post">
	<label form="coo"><b><i>Commantaire</i></b></label><br>
<textarea name="coo"  rows="10" cols="80" placeholder="Votre Commentaire !!"></textarea>
<br>
<input type="submit" value="Ajouter" name="envoi" >
</form>
</div>
<div id="En">

</div>
<footer>
	<div id="colum">
<a href="Home.php">Home</a><br>
<a href="produits.php">Produits</a><br>	
<a href="commentaire.php">Commentaires</a><br>
</div> <div id="follow">
	   Follow Me<br><br>
	<a href="www.facebook.com"><img src="facebook-logo-button.png" alt="facebook"></a>
	<a href="www.instagram.com"><img src="instagram-logo-button.png" alt="instagram"></a>
	<a href="www.twitter.com"><img src="twitter-logo-button.png" alt="twitter"></a><br><span style="font-size: 20px;">©2020 HOODIES</span>
</div>
      <div id="contact">
	Contact Me<br><br>
	Email:<input type="email" name="email" placeholder="xxxx@xxx.com" id="email" ><br><br>
	message:<textarea></textarea><br>
	<input type="submit" name="valder" value="Send" id="send">
</div>
</footer>
</body>
</html>