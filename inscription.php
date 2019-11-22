<?php
	session_start();
?> 

<html>
	<head>
		<title>Inscription</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		
		<main>
			<form action="" method="post">
				<label for="login">Votre Login</label>
				<input type="text" name="login" required />
				<label for="password">Votre mot de passe</label>
				<input type="password" name="password" required/>
				<label for="repassword">Confirmer mot de passe</label>
				<input type="password" name="repassword" required/>
				<input type="submit" value="S'inscrire" name="submitBtn"/>
			</form>
			
			<?php
				if(isset($_GET['error']))
					{	switch ($_GET['error']) 
						{
						case 'dp':
							$error="Le login est déja pris";
							break;
						case 'mpd':
							$error="mot de passe et confirmation de mot de passe différent";
							break;
						}
						echo "<b id=\"erreur\">".$error."</b>";	
					}
			 ?>
		</main>
	</body>
	<?php include('footer.php'); ?>
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
				header("location:inscription.php?error=dp");
			}
			if($_POST["password"] != $_POST["repassword"])
			{
				$_SESSION["validator"] = false;
				header("location:inscription.php?error=mpd");
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