 <?php
	session_start();
?> 

<html>
	<head>
		<title>Connexion Entreprise</title>
		<meta charset="utf-8"/>
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







<style>
 
	body
	{
		margin:0px;
	}
 
	header
	{
		height:40px;
		border-bottom:1px solid black;
		display:flex;
	}
	
	header nav
	{
		width:90%;
		margin:auto;
		
		display:flex;
		justify-content:space-evenly;
	}
	
	header img
	{
		height:35px;
		border-radius:50%;
	}
	
	header nav a
	{
		color:black;
		text-decoration:none;
		font-size:20px;
		height:100%;
		
		transition:color 0.3s ease;
	}
	
	header nav a:hover
	{
		color:orange;
	}
 
 
	.paper
	{
		width:80%;
		height:20%;
		
		norder-radius:5px;
		box-shadow:1px 1px 5px 2px grey;
		
		margin:auto;
		margin-top:20px;
	}

	.paper p
	{
		text-align:justify;
		width:90%;
		margin:auto;
	}
	
	.auteur
	{
		color:grey;
		text-decoration:underline;
	}

 </style>