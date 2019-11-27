<?php
	session_start();
	$bd=mysqli_connect("localhost","root","","livreor");
	$sql="SELECT * FROM `utilisateurs` WHERE login ='".$_SESSION['login']."' ;";
	$envoit=mysqli_query($bd,$sql);
	$reception=mysqli_fetch_all($envoit);
	mysqli_close($bd);
	

	if(isset($_POST['env-modif']))
	{		$bd=mysqli_connect("localhost","root","","livreor");
			$sql="SELECT COUNT(login) FROM `utilisateurs` WHERE login=\"".$_POST['login']."\" ;";
			$envoit=mysqli_query($bd,$sql);
			$count=mysqli_fetch_all($envoit);
		 	mysqli_close($bd);
		if($count[0][0]==0||$_POST['login']==$_SESSION['login'])
		{
		
			if(password_verify($_POST["password"],$reception[0][2])&&$_POST['nouvmdp']==$_POST['remdp'])
			{	if(isset($_POST['sup']))
				{
					$bd=mysqli_connect("localhost","root","","livreor");
					$sql="DELETE FROM `utilisateurs` WHERE `login` = '".$_SESSION['login']."';";
					
					$envoit=mysqli_query($bd,$sql);
					mysqli_close($bd);
					session_destroy();
					header("location:index.php");
				}
				if($_POST['nouvmdp']!="")
				{
					$bd=mysqli_connect("localhost","root","","livreor");
					$sql="UPDATE `utilisateurs` SET `password` = '".password_hash($_POST['nouvmdp'],PASSWORD_BCRYPT)."',`login` = '".$_POST['login']."' WHERE `utilisateurs`.`id` = ".$reception[0][0].";";
					$envoit=mysqli_query($bd,$sql);
					mysqli_close($bd);
					$_SESSION['login']=$_POST['login'];
				}
				else
				{
						$bd=mysqli_connect("localhost","root","","livreor");
						$sql="UPDATE `utilisateurs` SET `login` = '".$_POST['login']."' WHERE `utilisateurs`.`id` = ".$reception[0][0].";";
						$envoit=mysqli_query($bd,$sql);
						mysqli_close($bd);
						$_SESSION['login']=$_POST['login'];
				}
			}
			else
			{
				$err="Mot de passe incorrect";
			}
		}
		else
		{
			$err="Login deja pris essayer ".$_POST['login']."123 ";
		}
	}
?> 

<html>
	<head>
		<title>Profil</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<meta charset="utf-8"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		<main>
			<form  action="profil.php" method="post">
				<label>Login :</label><input  type="text" name="login" value="<?php echo $_SESSION['login'];?>" required>
				<label>Nouveau mot de passe :</label><input  type="password" name="nouvmdp">
				<label>Confirmer mot de passe :</label><input  type="password" name="remdp">
				<label>Mot de passe :</label><input  type="password" name="password" required>
				<label>supprimer mon compte :</label><input type="checkbox" name="sup" id="checksup" >
				<input id="valid" type="submit" name="env-modif">
			</form>
			<?php if(isset($err))
					{
						echo $err;
					}
			?>
			<?php include('footer.php') ?>
		</main>
	</body>
</html>