 <?php
	session_start();
?> 

<html>
	<head>
		<title>Connexion Entreprise</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		
		<main>
			<form id="commentaireForm" action="" method="post">
				<label for="commentaire">Votre commentaire</label>
				<textarea name="commentaire" cols="50" row="20"></textarea>
				
				<input type="submit" value="envoyer" name="submitBtn"/>
			</form>
		</main>
		
	</body>
</html>


<?php
	if(isset($_POST["submitBtn"]))
	{
		$conn = mysqli_connect("localhost","root","","livreor");

		$requestId = "SELECT id FROM utilisateurs WHERE login = '".$_SESSION["login"]."';";
		$queryId = mysqli_query($conn,$requestId);
		$id = mysqli_fetch_all($queryId);

		$request = "INSERT INTO commentaires (`id`,`commentaire`,`id_utilisateur`,`date`) 
					VALUES (NULL,'".$_POST["commentaire"]."','".$id[0][0]."',CURRENT_DATE);";

		if(mysqli_query($conn,$request))
		{
			header("location:livre-or.php");
		}

	}
?>
