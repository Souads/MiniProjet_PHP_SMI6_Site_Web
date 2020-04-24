<?php
ob_start();
session_start();
    $num=$_POST['num1'];
    $Sou=$_SESSION['panier']['SousTotal'];
    $id=$_SESSION['id_client'];
    
 try{
         $connect=new PDO('mysql:host=localhost;dbname=id12823799_souad','id12823799_shopinghoodies','@SouadQwE126');
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $connect->exec("INSERT INTO Paiment (id_paiment,id_client,card_num,Sous_total) VALUES (NULL,'$id','$num','$Sou')");
         $connect=null;
     }catch(Exception $e){ $e->getMessage();}
     unset($_SESSION['panier']);
  echo"<div style='position:relative;left:300px;top:50px;'>";
  echo "<h1>Félicitation !!!</h1>";
  echo "<div style='background-color: #D3D3D3; width:800px;margin: 20px;'>";
  echo "<span style='color:#008B8B;'><b>Votre commande a bien été reçue !! </b> Merci beacoup </span>";
  echo"</div></div>";

?>