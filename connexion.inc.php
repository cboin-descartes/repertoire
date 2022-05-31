<?php


/* Création de objet PDO de connexion */
function connectBD()
{
    $user = "root";
    $pass =  "";
   
    $cnx= new PDO('mysql:host=localhost;dbname=repertoire',$user,$pass);

    //Pour avoir plus de détails sur les exception lors de l'envoi d'une requête
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $cnx;
}

?>
