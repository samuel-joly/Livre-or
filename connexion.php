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
				<label for="login">Votre Login</label>
				<input type="text" name="login"/>
				<label for="password">Votre mot de passe</label>
				<input type="password" name="password"/>
				<input type="submit" value="Se connecter" name="submitBtn"/>
			</form>
		</main>
		
	</body>
</html>

<?php
	if(isset($_POST["submitBtn"]))
	{
		$conn = mysqli_connect("localhost","root","","livreor");
		$request = "SELECT login, password FROM utilisateurs";
		$query = mysqli_query($conn,$request);
		$result = mysqli_fetch_all($query);
				
		$count = 0;
		while($count < count($result))
		{
			if($_POST["login"] == $result[$count][0] && password_verify($_POST["password"], $result[$count][1]))
			{
				$_SESSION["connected"] = true;
				$_SESSION["login"] = $_POST["login"];
				header("location:index.php");
			}
			$count++;
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