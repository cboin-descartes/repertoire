<?php
include("entete.php");
include("menu.php");

include("connexion.inc.php");

if(isset($_GET['page'])){
    $page=$_GET['page'];


    switch($page){
        case 'afficher': include("affichePersonne.php"); break;
        case 'inserer':include("insertPersonne.php"); break;
        case 'supprimer': echo "<p>Fonctionnalité de suppression non implémentée </p>";break;
        default: echo "<p class=erreur> Bouh pas bien ! </p>";
    }

}
else{
    echo "<p> Page inexistante ! </p>";
}


include('pieddepage.php');
?>