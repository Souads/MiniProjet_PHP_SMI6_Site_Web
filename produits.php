<?php
 session_start();
 if(!isset($_SESSION['refrech'])) $_SESSION['refrech']="";
   echo "".$_SESSION['refrech']."";
   unset($_SESSION['refrech']);
  if(isset($_POST['env']))
 {
     if(isset($_SESSION['id_client']))
     {
           $id_pro=$_POST['val'];
           try{
            $connect=new PDO('mysql:host=localhost;dbname=id12823799_souad','id12823799_shopinghoodies','@SouadQwE126');
                       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql=$connect->query("SELECT * FROM Produits where id_produit='$id_pro'");
                    while($Tab_pr=$sql->fetch())
                    {
                        $code=$Tab_pr['id_produit']; 
                        $art=$Tab_pr['article_nom'];
                        $prix=$Tab_pr['prix'];
                        $image=$Tab_pr['img_produit'];
                        
                    }
                    $sql->closeCursor();
           }catch(Exception $e){ $e->getMessage();}
                        if (!isset($_SESSION['panier'])){
                                    $_SESSION['panier']=array();
                                    $_SESSION['panier']['idproduit'] = array();
                                    $_SESSION['panier']['qteProduit'] = array();
                                    $_SESSION['panier']['prixProduit'] = array();
                                    $_SESSION['panier']['imgProduit'] = array();
                                    $_SESSION['panier']['artProduit'] = array();
                                    $_SESSION['panier']['prixTotal'] = array();
                                 }
                                 $nbr=$_POST['nbr'];
                $p= array_search($code,  $_SESSION['panier']['idproduit']);
                if($p !== false)
                 {
                       $_SESSION['panier']['qteProduit'][$p] += $nbr;
                 }
                 else
                 {
                        array_push($_SESSION['panier']['imgProduit'],$image);
                        array_push($_SESSION['panier']['artProduit'],$art);
                        array_push( $_SESSION['panier']['idproduit'],$code);
                        array_push( $_SESSION['panier']['qteProduit'],$nbr);
                        array_push( $_SESSION['panier']['prixProduit'],$prix);
                        
                 }
     }
     else
         {
            header("location:identifier.php");
          }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Online Shoping For Hoodies  </title>
  <style type="text/css">
  input[type=submit] 
 {
  width: 60%;
  background-color: navy;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position:relative; left:60px;

  	}
  	img{width:250px;height:300px;border-radius:30px;}
  	table{position:relative;left:90px;}
  	td{height:30px;}
  	p{position:relative;bottom:0px; text-align: center;
  		color: blue;
  		size:40px;}
  	a:hover{width: 500px;color:green;}
  	
  body {
  		background-image: linear-gradient(to bottom right,#F8F8FF,#F0FFFF );
         overflow-x: hidden;
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
 body {
 	  background-image: url("img.jpg");
 }
  </style>
 
    
</head>
<body >
	<table border="0px" cellspacing="30">
<tr>
<td><img src="img1.jpg" alt="hihi" width="20%" ><p> Prix : 170 DH</p><form action="" method="post"><input type="hidden" name="val" value="100"><input type=submit value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite" ></form></td>
<td><img src="img4.jpg" alt="hihi" width="20%"><p> Prix : 150 DH</p><form action="" method="post"><input type="hidden" name="val" value="101"><input type="submit" value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite"></form></td>
<td><img src="IMG5.jpg" alt="hihi" width="20%"><p> Prix : 150 DH</p><form action="" method="post"><input type="hidden" name="val" value="102"><input type=submit value="Ajouter au panier"name="env"><input type="text"  name="nbr" placeholder="Quantite"></form></td>
<td><img src="img6.jpg" alt="hihi" width="20%"><p> Prix : 200 DH</p><form action="" method="post"><input type="hidden" name="val" value="103"><input type=submit value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite"></td></form>
</tr>
<tr>
<td><img src="img7.jpg" alt="hihi" width="20%" ><p> Prix : 169 DH</p><form action="" method="post"><input type="hidden" name="val" value="104"><input type=submit value="Ajouter au panier" name="env"><input type="text" name ="nbr" placeholder="Quantite"></form></td>
<td><img src="img8.jpg" alt="hihi" width="20%"><p> Prix : 170 DH</p><form action="" method="post"><input type="hidden" name="val" value="105"><input type="submit" value="Ajouter au panier" name="env"><input type="text" name="nbr" placeholder="Quantite"></form></td>
<td><img src="img9.jpg" alt="hihi" width="20%"><p> Prix : 150 DH</p><form action="" method="post"><input type="hidden" name="val" value="106"><input type=submit value="Ajouter au panier" name="env"><input type="text" name="nbr" placeholder="Quantite"></form></td>
<td><img src="img10.jpg" alt="hihi" width="20%"><p> Prix : 170 DH</p><form action="" method="post"><input type="hidden" name="val" value="107"><input type=submit value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite"></td></form>
</tr>
<tr>
<td><img src="img11.jpg" alt="hihi" width="20%" ><p> Prix : 200 DH</p><form action="" method="post"><input type="hidden" name="val" value="108"><input type=submit value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite"></form></td>
<td><img src="img12.jpg" alt="hihi" width="20%"><p> Prix : 179 DH</p><form action="" method="post"><input type="hidden" name="val" value="109"><input type="submit" value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite"></form></td>
<td><img src="img13.jpg" alt="hihi" width="20%"><p> Prix : 150 DH</p><form action="" method="post"><input type="hidden" name="val" value="110"><input type=submit value="Ajouter au panier"name="env"><input type="text"  name="nbr" placeholder="Quantite"></form></td>
<td><img src="img14.jpg" alt="hihi" width="20%"><p> Prix : 200 DH</p><form action="" method="post"><input type="hidden" name="val" value="111"><input type=submit value="Ajouter au panier" name="env"><input type="text"  name="nbr" placeholder="Quantite"></td></form>
</tr>
</table>
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