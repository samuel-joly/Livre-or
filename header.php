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
						echo "<a href='profil.php'>Profil</a>";	
					} 
					else
					{
						echo "
						<a href=\"inscription.php\">Inscription</a>
						<a href=\"connexion.php\">Connexion</a>
						";
					}
				?>
				
			<!--	<a href="commentaire.php">Commentaire</a>  !-->
				<a href="livre-or.php">Livre d'or</a>
			</nav>
			
			<?php
			
				if(isset($_SESSION["connected"]))
				{
					echo " 
							<div id='profilPaper' class='bubble'>
								<a href=\"profil.php\">Profil</a>
								<a href=\"index.php?deco=true\">Deconnecter</a>
							</div>";
				}
				else if(!isset($_SESSION["connected"]))
				{
					echo " 
							<div id='profilPaper' class='bubble'>
								<a href=\"inscription.php\">Inscription</a>
								<a href=\"connexion.php\">Se connecter</a>
							</div>";
				}


				if(isset($_GET["deco"]))
				{
					session_destroy();
					header("location:index.php");
				}

 
			
			?>
</header>