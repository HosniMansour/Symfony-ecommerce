<?php
$con=mysqli_connect("127.0.0.1","root","a1z2e3r4","DBmedor");
if (mysqli_connect_errno($con))
{
   echo '{"query_result":"ERROR"}';
}
 
$nom = $_GET['nom'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$objet = $_GET['objet'];
$message = $_GET['message'];
$adresse = $_GET['adresse'];
$budget = $_GET['budget'];
$type = $_GET['type'];
 
$result = mysqli_query($con,"INSERT INTO `DBmedor`.`Message` (`id`, `produit`, `user_id`, `type`, `objet`, `nom`, `email`, `tele`, `message`, `budget`, `adresse`, `etat`) VALUES (NULL, NULL, NULL, '$type', '$objet', '$nom', '$email', '$telephone', '$message', '$budget', '$adresse', NULL);");

/*$result = mysqli_query($con,"INSERT INTO `Message`(`id`, `produit`, `user_id`, `type`, `objet`, `nom`, `email`, `tele`, `message`, `budget`, `adresse`, `etat`) VALUES (0,'','',$type,$objet,$nom,$email,$telephone,$message,$budget,$adresse,'')");*/
 
if($result == true) {
    echo '{"query_result":"SUCCESS"}';
}
else{
    echo '{"query_result":"FAILURE"}';

}
mysqli_close($con);
?>
