 <?php
	session_start();
?> 

<html>
	<head>
		<title>Livre Or</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		
		<main>
			<?php

				$conn = mysqli_connect("localhost","root","","livreor");
				$request = "SELECT commentaires.commentaire, utilisateurs.login, date_format(commentaires.date,\"%e %M %Y\") FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC ";
				$query = mysqli_query($conn,$request);
				$result = mysqli_fetch_all($query);
				if(isset($_SESSION["connected"]))
				{
					include("commentaire.php");
				}
				else{
					echo "<p id='no-connect'>Seul les connectés ont le droit de poster un commentaire.<br/>
					Pour se connecter <a href='connexion.php'>cliquez ici</a></p>";
				}
				foreach($result as $commentaire => $infos)
				{
					echo "
					<div class='paperOr'>
						<p class='commInfos'><img src='userConnect.png'/> Ecrit par <b>".$infos[1]."</b> le <b>".$infos[2]."</b></p>
						<p class='comm'>".$infos[0]."</p>
					</div>";
				}
				

			?>
		</main>
		<?php include("footer.php"); ?>
	</body>
</html>






