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
					echo " <input type='checkbox' id='checkBtn'/>
							

						   <label for='checkBtn'>	
					   			<img src='userConnect.png'/>
				   			</label>
							<form id='profilPaper' class='bubble' method='post'>
								<input type='submit' value='Profil' name='profilBtn'/>
								<input type='submit' value='Déconnexion' name='decoBtn'/>
							</form>";
				}
			
			?>
</header>