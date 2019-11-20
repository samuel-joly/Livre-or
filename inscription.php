<?php
	session_start();
?> 

<html>
	<head>
		<title>Présentation Entreprise</title>
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
				<label for="login">Votre Login</label>
				<input type="text" name="login"/>
				<label for="password">Votre mot de passe</label>
				<input type="password" name="password"/>
				<input type="submit" value="S'inscrire" name="submitBtn"/>
			</form>
		</main>
	</body>
</html>

<?php
	$_SESSION["validator"] = true;
	
	if(isset($_POST["submitBtn"]))
	{
		$conn     = mysqli_connect("localhost","root","","livreor");
		$request  = "SELECT login FROM utilisateurs";
		$query    = mysqli_query($conn,$request);
		$response = mysqli_fetch_all($query);
		
		$count = 0;
		while($count < count($response))
		{
			if($response[$count][0] == $_POST["login"])
			{
				$_SESSION["validator"] = false;
				header("location:inscription.php");
			}
			$count++;
		}
		
		if($_SESSION["validator"])
		{
			$request = "INSERT INTO utilisateurs (`id`,`login`,`password`) VALUES (NULL,'".$_POST["login"]."','".password_hash($_POST["password"],PASSWORD_BCRYPT)."');";
			mysqli_query($conn, $request);
			header("location:connexion.php");
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
 
 </style>