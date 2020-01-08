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
				<a href="livre-or.php">Livre d'or</a>
				<?php

					if(isset($_SESSION["connected"]))
					{
						echo "<a href=\"index.php?destroy\">Deconnexion</a>";
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
			</nav>
			
			<input type='checkbox' id='checkBtn'/>
			<label for='checkBtn'>
				<img src='userConnect.png'/>
			</label>
			
			<?php
			
				if(isset($_SESSION["connected"]))
				{
					echo " 
							<div id='profilPaper' class='bubble'>
								<a href=\"profil.php\">Profil</a>
								<a href=\"index.php?destroy=true\">Deconnecter</a>
							</div>";
				}
				else
				{
					echo " 
							<div id='profilPaper' class='bubble'>
								<a href=\"inscription.php\">Inscription</a>
								<a href=\"connexion.php\">Se connecter</a>
							</div>";
				}			
			?>
</header>