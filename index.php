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
			
			<input type='checkbox' id='checkBtn'/>


			<label for='checkBtn'>	
				<img src='userConnect.png'/>
			</label>
			
			<?php
			
				if(isset($_SESSION["connected"]))
				{
					echo " 
							<form id='profilPaper' class='bubble' method='post'>
								<input type='submit' value='Profil' name='profilBtn'/>
								<input type='submit' value='Déconnexion' name='decoBtn'/>
							</form>";
				}
				else
				{
				echo " 
							<form id='profilPaper' class='bubble' method='post'>
								<input type='submit' value='Connexion' name='connectBtn'/>
								<input type='submit' value='Inscription' name='inscriptionBtn'/>
							</form>";
				}
			
			?>
		</header>
		
		<main>
			
			<?php
				if(isset($_SESSION["connected"]))
				{
					echo "<article class='paper'>
							<h1>Le Coup Sanofi</h1>
							<p>En 2016, la Philippine fait une campagne nationale de vaccin contre la dengue. Sanofi reprend 
							le marché et vend pour 50 Million d'€ de vaccin. De nombreux cas de décès suite a la prise du vaccin 
							sont avéré. Sanofi niera les fait et ne remboursera pas  les Philippines</p>
							
							<p class='auteur'>Etienne Chourad</p>
						</article>";
			
				}
				else
				{
					echo "<article class='paper'><h1>Nos articles sont disponibles pour les utilisateurs connecté.</h1>
						<p>Pour vous connecter, <a href='connexion'>cliquez ici</a></p></article>";
				}
			?>
		
		</main>
		
	</body>
</html>
 
<?php

	if(isset($_POST["profilBtn"]))
	{
		header("location:profil.php");
	} 
	else if(isset($_POST["decoBtn"]))
	{
		session_destroy();
		header("location:index.php");
	}

	if(isset($_POST["connectBtn"]))
	{
		header("location:connexion.php");
	}
	else if(isset($_POST["inscriptionBtnn"]))
	{
		header("location:inscription.php");
	}
?>
 
 
<style>

	body
	{
		margin:0px;
		overflow-x: hidden;
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
		margin-right:13px;
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

	#profilPaper input
	{
		border-radius:11px;
		background-color:orange;
		border:0px;
		margin:5px;
		transition:background-color 0.4s ease;
	}

	#profilPaper input:hover
	{
		background-color:#ffcf01;
		cursor:pointer;
	}


	.paper
	{
		width:80%;
		height:20%;
		
		norder-radius:5px;
		box-shadow:1px 1px 5px 2px grey;
		
		margin:auto;
	}
	
	.paper h1
	{
		text-align:center;
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