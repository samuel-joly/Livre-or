<?php
if(isset($_GET['destroy']))
	{
		session_destroy();
		header("location:index.php");
	}
?>
<header>
			<nav>
				<a href="index.php">Accueil</a>
				<?php
					if(isset($_SESSION["connected"]))
					{
						echo "<a href=\"index.php?destroy=end\" >Deconexion</a>";
					} 
					else
					{
						echo "
						<a href=\"inscription.php\">Inscription</a>
						<a href=\"connexion.php\">Connexion</a>
						";
					}
				?>
				
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