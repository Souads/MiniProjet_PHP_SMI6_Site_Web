<?php
 session_start();
   $Sous=$_SESSION['panier']['SousTotal'];
   try{
        $connect=new PDO('mysql:host=localhost;dbname=id12823799_souad','id12823799_shopinghoodies','@SouadQwE126');
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     for($i=0;$i<count($_SESSION['panier']['idproduit']);$i++)
       {
                $code= $_SESSION['panier']['idproduit'][$i]; 
                $Q= $_SESSION['panier']['qteProduit'][$i]; 
                $P=$_SESSION['panier']['prixTotal'][$i]; 
                $id_C=$_SESSION['id_client']; 
        $connect->exec("INSERT INTO Commande (id_client,id_produit,quantite,prix_total) VALUES ('$id_C','$code','$Q','$P')");
      }
          }catch(Exception $e){ $e->getMessage();}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Gestion de panier</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name='viewport' content='width=device-width, initial-scale=1'>
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <style type="text/css">
       #p{
       	     position: relative;left:400px;top:80px;
               

       }
        label{
        	 font-variant-caps: small-caps;
        	 font-size: 20px;
        }
     input[type=submit]
     {
             position:relative;left:200px;top:20px;
               width: 10%;
              background-color: #4CAF50;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer;
     }
        	footer{ 
background-color:#708090;
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
left: 90px;
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
 h1
      {
      	text-align: center;
      	color: blue;
      	position: relative;top:30px;
      }
       h4
      {
      	text-align: center;
      	color: blue;
      	position: relative;top:30px;
      }
 </style>
 <script>
      function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('V')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
 </script>
</head>
<body>
	<h1 > Votre Paiment</h1>
	 <h4>Total Prix : <?php echo $Sous ?> </h4>
<form action ="achete.php" method="post">
<div id="p">
  <table cellpadding="10" cellspacing="20">
  	 <tr>
  	 	<label>Type de carte bancaire </label>
  	 	<td><input type="checkbox"  name="V" value="visa"   onclick="onlyOne(this)"><i class="fab fa-cc-visa"></i> Visa</td>
  	 	<td><input type="checkbox"  name="V" value="Mastercard" onclick="onlyOne(this)"><i class="fab fa-cc-mastercard"  ></i> Mastercard</td>
  	 </tr>
  	 <tr>
  	 	<td><label>N° de carte</label></td>
  	 	<td><input type="text" name="num1" size=30 required></td>
  	 </tr>
  	 <tr>
  	 	<td><label>Code sécurité </label></td>
  	 	<td><input type="password" name="num2" size=30 required></td>
  	 </tr>
  	 <tr>
  	 	<td><label>Nom de porteur </label></td>
  	 	<td><input type="text" name="num3" placeholder="Meme nom que sue la carte" size=30 required></td>
  	 </tr>
  	</table>
  	
  	   <input type="submit"  name="acheter"  value="J'ACHETE !">
  </form>
</div>
<footer>
<div id="colum">
<a href="Home.html">Home</a><br>
<a href="produits.html">Produits</a><br>	
<a href="commentaire.html">Commentaires</a><br>
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

