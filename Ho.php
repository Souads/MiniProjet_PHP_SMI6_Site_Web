<?php
session_start();
?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> Online Shoping For Hoodies </title>
  </head>
  <style type="text/css">

     
     #img1{width:1330px;height:460px;border-radius:30px;visibility:hidden;position:relative;top:20px;}
    #img2{width:1330px;height:460px;border-radius:30px;position:relative;bottom: 450px;visibility:hidden;}
    #img3{width:1330px;height:460px;border-radius:30px;position:relative;bottom: 915px;visibility:hidden;}
    #im{height:500px;}

   body {
  		background-image: linear-gradient(to bottom right,#F8F8FF,#F0FFFF );
      overflow-x: hidden;
  	}
  	
    footer{ 
background-color:#708090 ;
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
 button{
 background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
     position:relative;left:600px;
 }
  </style>
  <script type="text/javascript">
      var cp =0;

    function f() {
    
    var a=document.getElementById('img1');
    var b=document.getElementById('img2');
    var c=document.getElementById('img3');
    if (cp==0) {
    a.style.visibility="visible";
    b.style.visibility="hidden";
    c.style.visibility="hidden";
      cp++;
  }
  else if (cp==1) {
    a.style.visibility="hidden";
    b.style.visibility="visible";
    c.style.visibility="hidden";
      cp++;}
    else if (cp==2) {
    a.style.visibility="hidden";
    b.style.visibility="hidden";
    c.style.visibility="visible";
      cp=0;
    }
    setTimeout(f,3000);}
  </script>
  

<body onload="f()">
     <a href="Rapport Site_Web_SAIDI_Souad_SMI6.pdf" download> <button ><i class="fa fa-download" >  Rapport de Mini_Projet</i></button> </a>
     
<div id="im">
  
<img src="im2.jpg" id="img1">
<img src="im1.jpg" id="img2">
<img src="soldes6.jpg" id="img3">

</div>
<footer>
  <div id="colum">
<a href="Home.php"> Home</a><br>
<a href="produits.php">Produits</a><br> 
<a href="commentaire.php">Commentaire</a><br>
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