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
				$request = "SELECT commentaires.commentaire, utilisateurs.login, commentaires.date
							FROM commentaires
 							INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC ";
				$query = mysqli_query($conn,$request);
				$result = mysqli_fetch_all($query);

				foreach($result as $commentaire => $infos)
				{
					echo "<div class='paper'>";
					echo "<p>".$infos[0]."</p>";
					
					echo "<p class='auteur'>".$infos[1]."</p>";

					echo "<p>Le ".$infos[2]."</p>";
					echo "</div>";
				}
				if(isset($_SESSION["connected"]))
				{
					echo "<a href=\"commentaire.php\">ajouté un commentaire</a>";
				}
				else{
					echo "seul les abonnés ont le droit de poster un commentaire";
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
  	header input[type='checkbox']
 	{
 		display:none;
 	}
	
	header label
	{
		cursor:pointer;
		
	}

	header input[type='checkbox']:checked~#profilPaper
	{
		opacity:1;
	}

	header input[type='checkbox']:checked~label
	{
		transform: translateX(0px);	
	}
	

	.bubble 
	{
	    background: #cecdcb;
	    color: #FFFFFF;

	    border-radius: 10px;
	    padding: 0px;

		position:absolute;
		top:50px;
		right:10px;

		display:flex;
		flex-direction:column;

		opacity:0;
		transition:opacity 0.4s ease;
	}

	.bubble:after 
	{
	    content: '';
	    position: absolute;
	    display: block;

	    width: 0;
	    z-index: 1;
	    border-style: solid;
	    border-color: #cecdcb transparent;
	    border-width: 0px 13px 16px;
	    top: -16px;
	    left: 88%;
	    margin-left: -22px;
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