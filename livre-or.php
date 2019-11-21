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
					echo "seul les abonnés ont le droit de poster un commentaire";
				}
				foreach($result as $commentaire => $infos)
				{
					echo "<div class='paper'>";
					echo "<p>".$infos[0]."</p>";
					
					echo "<p class='auteur'>".$infos[1]."</p>";

					echo "<p>Le ".$infos[2]."</p>";
					echo "</div>";
				}
				

			?>
		</main>
	</body>
</html>






