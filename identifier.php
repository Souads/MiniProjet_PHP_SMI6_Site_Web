<?php
ob_start();
session_start();
$p="";
$g="";
$c=0;
$b=0;
if (isset($_POST['login'])){
$email=$_POST["email"];
$pass=$_POST["pwd"];
try{
$connect=new PDO('mysql:host=localhost;dbname=id12823799_souad','id12823799_shopinghoodies','@SouadQwE126');
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
$sql=$connect->query('SELECT * FROM Clients');      
        while ($t2 = $sql->fetch())
        {
          if($t2['email'] != $email && $t2['mod_pass']==$pass)
                    $b=1;
         if ($t2['mod_pass']!=$pass && $t2['email'] == $email ) 
                $c=1;
          if($t2['email']==$email  && $t2['mod_pass']==$pass)   
             {
$_SESSION['nom']=$t2['nom'];
$_SESSION['prenom']=$t2['prenom'];
$_SESSION['id_client']=$t2['id_client'];
$_SESSION['refrech']="PRESS F5";
header("Location: produits.php");
              }
        }
          $sql->closeCursor();
          }catch (Exception $e){ $e->getMessage();}
          if($b==1)  $g="Adresse e-mail non valide . Veuillez réessayez !!";
          if($c==1)  $p="Mot de passe non valide.Veuillez réessayez!!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Online Shoping For Hoodies  </title>
 <style type="text/css">
  span{
    color:red;
    position:relative;left:100px;
  }
	body {
  		background-image: linear-gradient(to bottom right,#F8F8FF,#F0FFFF );
  	}

   	#iden{position: relative;left:450px;top:50px;}
  label {
  	   font-variant: small-caps;
  	   font-size: 200%;
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

 <div id="iden">
 	<form name="form" method="post"  action="<?php $_SERVER['PHP_SELF'] ?>">
    <label><i>J'ai Déja Un Compte</i></label><br><br>
 	<input type="text" name="email" size=50  placeholder="Votre Email " required ><br><span><?php echo $g ; ?></span><br>
    <input type="password" name="pwd" id="m"  placeholder="Votre Mot De Passe " required><br><span><?php echo $p ; ?></span><br>
    <input type="submit" name="login" value="S'IDENTIFIER"  onclick = "window.parent.frames.A.location.reload ()"  >
     <lable><br><br><br><br> Crée un compte !! <a href="inscrire.php" >  ICI </a></a></lable>
    </form>
</div>

<footer>
	<div id="colum">
<a href="Home.php">Home</a><br>
<a href="produits.php">Produits</a><br>	
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