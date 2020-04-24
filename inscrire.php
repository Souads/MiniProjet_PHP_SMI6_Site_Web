<?php
session_start();
$g="";
$p="";
$t="";
$bool=false;
if(isset($_POST['REG']))
{
      $nom =$_POST['nom'];
      $prenom=$_POST['prenom'];
      $email =$_POST['email'];
      $num =$_POST['Num'];
      $addr =$_POST['addr'];
      $pass=$_POST['pwd']; 
    if(!preg_match("^[_a-z0-9-]+(.[_a-z0-9-]+)@[a-z0-9-]+(.[a-z0-9-]+)(.[a-z]{2,3})$^", $email)){
        $g="Format d'email invalide ( example12@hhg.kd).";
        $bool=true;
    }
    if (!preg_match('#^[0-9]{10}$#', $num)) {
           $t="le numero  de Telephone est invalider !";
           $bool=true;
               }
   if(strlen($pass)<8){
   	  $p="Trop court ,(Au moins 8 caracteres"; $bool=true;}
   if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#',$pass)){
        $p=" Au Moins contenant des caractere speciaux et Majuscule ";
        $bool=true;
        }
   if(!$bool)
  {
      $_SESSION['nom']=$nom;
      $_SESSION['prenom']=$prenom;
      $_SESSION['refrech']="PRESS F5";
      try{
       $connect=new PDO('mysql:host=localhost;dbname=id12823799_souad','id12823799_shopinghoodies','@SouadQwE126');
       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO Clients (id_client,nom,prenom,email,mod_pass,Adress,num_tele)
                     VALUES (NULL,'$nom','$prenom','$email','$pass','$addr','$num')";
       $connect->exec($sql);
          $last_id = $connect->lastInsertId();
           $_SESSION['id_client']=$last_id;
           header("location: produits.php");
      } catch(PDOException $e) {    echo  $e->getMessage();}
      $connect= null;// close Data base.
  } 
          
      }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Online Shoping For Hoodies  </title>
  <style type="text/css">
  span {
       color:red;
       position: relative;left:95px;
  }
  	body {
  		background-image: linear-gradient(to bottom right,#F8F8FF,#F0FFFF );
         overflow-x: hidden;
  	}

   	#log{position: relative;left:450px;top:50px;}
  label {
  	   font-variant: small-caps;
  	   font-size: 250%;
  }
  	input {
  width: 30%;
  padding: 12px 20px;
  margin:8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  position: relative;left:100px;
}
input[type=submit] {
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
  </style>
</head>
<body>
<div id="log">
 <form name="form"  action="<?php $_SERVER['PHP_SELF'] ?>" method="post" ?enctype="application/x-www-form-urlencoded">
 <label><i>Créer un compte</i></label><br><br>
   <input  type="text" name="prenom" id="p"  placeholder="Votre Prénom"  required><br><br>
   <input  type="text" name="nom" id="n"  placeholder="Votre Nom " required><br><br>
   <input type="text" name="email" size=50  placeholder="Votre Email "  required><br><span><?php echo "$g"; ?></span><br>
   <input type="text" name="Num" id="nu"  placeholder="Votre Numero du telephone " required><br><span><?php echo "$t"; ?></span><br>
   <input type="text" name="addr" id="m1"  placeholder="Votre Adresse " required><br><br>
   <input type="password" name="pwd" id="m"  placeholder="Votre Mot De Passe " required><br><span><?php echo "$p"; ?></span><br>
   <input type="submit" name ="REG" value="REGISTRE" onclick="location.reload();">
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