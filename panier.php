<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Gestion de panier</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name='viewport' content='width=device-width, initial-scale=1'>
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
</body>
<?php
if(isset($_SESSION['panier']))
 {         
     $action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null ));
     if($action !== null)
     {
         $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
         $l = preg_replace('#\v#', '',$l);
         
              $tmp=array();
              $tmp['idproduit'] = array();
              $tmp['qteProduit'] = array();
              $tmp['prixProduit'] = array();
              $tmp['imgProduit'] = array();
              $tmp['artProduit'] = array();
        for($i = 0; $i < count($_SESSION['panier']['idproduit']); $i++)
         {
               if ($_SESSION['panier']['idproduit'][$i] !== $l)
           {
            array_push( $tmp['idproduit'],$_SESSION['panier']['idproduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            array_push( $tmp['imgProduit'],$_SESSION['panier']['imgProduit'][$i]);
            array_push( $tmp['artProduit'],$_SESSION['panier']['artProduit'][$i]);
           }
         }
          $_SESSION['panier']=$tmp;
          unset($tmp);
     }
     
    if(count($_SESSION['panier']['idproduit'])>0)
    {
                 $total=0;
        for($i=0;$i<count($_SESSION['panier']['idproduit']);$i++) 
       {      
           $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   $_SESSION['panier']['prixTotal'][$i]=$_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
     echo'<div  style="position:relative;top:20px; background-color: #D3D3D3; width:1000px;margin: auto;">';    
     echo "<table  cellspacing=40 ";
     echo '<tr><td ><div  class="image"><img src="'.htmlspecialchars($_SESSION['panier']['imgProduit'][$i]).'" alt="" style="width:150px;height:100px;"/></div></td>';
     echo "<td width=20% ><b>Article</b><br>".htmlspecialchars($_SESSION['panier']['artProduit'][$i])."</td>";
     echo "<td  width=20%><b>CodeArticle</b><br>".htmlspecialchars($_SESSION['panier']['idproduit'][$i])."</td>";
     echo "<td  width=20%><b>Quantite</b><br>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td>";
     echo"<td  width=20% ><b>Prix Unitaire</b><br>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td></tr></table>";
     echo"<a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['idproduit'][$i]))."\"><i class='fa fa-trash' style='font-size:20px;position:relative;bottom:190px;left:975px;'></i></a>";
     echo"</div><br><br>";
      }
        $_SESSION['panier']['SousTotal']=$total;
     echo"<div style='position:relative;left:500px;'>";
     echo"<table width=20% >";
     echo"<tr><td style='position:relative;left:20px;' >SOUS_TOTAL</td><td>".sprintf("%01.2f",$total)."</td></tr>";
     echo"<tr><td cosplan=2><form action='paiment.php'><input type='submit' name='acheter' value='ACHETER' style='width: 150%; background-color: navy; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px'></form></td></tr>";
     echo"</table></div>";
    }
    else
    {
         echo"<div style='position:relative;left:200px;'>"; 
         echo "<div style='position:relative;top:150px;'>";
         echo "<span style='font-size:20px;'>Votre panier est vide<span><br> ";
         echo "Ajouter des produits ici et nous rendre heureux! <br>";
         echo "</div>";
         echo"<a href=\"produits.php\" >CONTINUER  VOS ACHATS</a>";
         echo"<i class='fas fa-cart-plus' style='position:relative;left:250px;top:30px;font-size:200px;color:black;'></i>";
         echo"<div>";
    }
 }
 else
   {     echo"<div style='position:relative;left:200px;'>"; 
         echo "<div style='position:relative;top:150px;'>";
         echo "<span style='font-size:20px;'>Votre panier est vide<span><br> ";
         echo "Ajouter des produits ici et nous rendre heureux! <br>";
         echo "</div>";
         echo"<a href=\"produits.php\" >CONTINUER  VOS ACHATS</a>";
         echo"<i class='fas fa-cart-plus' style='position:relative;left:250px;top:30px;font-size:200px;color:black;'></i>";
         echo"<div>";
   }
?>
</body>
</html>