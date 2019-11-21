<?php function chif($mdp)
{
	$mdp=hash('sha512', $mdp);
	$mdp= "pour un mots de passe".$mdp."mega solide";
	$mdp=hash('sha256', $mdp);
	return $mdp;
}

 function supr($id)
{
	$bd=mysqli_connect("localhost","root","","moduleconnexion");
	$sql="DELETE FROM `utilisateurs` WHERE `utilisateurs`.`id` = ".$id.";";
	$envoit=mysqli_query($bd,$sql);
}
?>