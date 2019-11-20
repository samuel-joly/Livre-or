 <?php
	session_start();
?> 

<html>
	<head>
		<title>Connexion Entreprise</title>
		<meta charset="utf-8"/>
	</head>
	
	<body>
		<header>
			<nav>
				<a href="index.php">Accueil</a>
				<a href="inscription.php">Inscription</a>
				<a href="connexion.php">Connexion</a>
				<?php
					if(isset($_SESSION["connected"]))
					{
						echo "<a href='profil.php'>Profil</a>";	
					}
				?>
				<a href="commentaire.php">Commentaire</a>
				<a href="livre-or.php">Livre d'or</a>
			</nav>
			
			<?php
			
				if(isset($_SESSION["connected"]))
				{
					echo " <a href='profil.php'><img src='userConnect.png'/></a>";
				}
			
			?>
		</header>
		
		<main>
			<form action="" method="post">
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
 
 
	
	form
	{
		width:30%;
		display:flex;
		flex-direction:column;
		
		margin:auto;
		margin-top:10%;
	}

	textarea
	{
		width:100%;
		height:200px;
	}
 
 </style>