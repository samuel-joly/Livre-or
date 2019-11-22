<?php
	session_start();
?> 
 
<html>
	<head>
		<title>Accueil</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		
		<main>
			
			<?php
				if(isset($_SESSION["connected"]))
				{
				?>
				<article class='paper'>
							<h1>Le Coup Sanofi</h1>
							<p>En 2016, la Philippine fait une campagne nationale de vaccin contre la dengue. Sanofi reprend 
							le marché et vend pour 50 Million d'€ de vaccin. De nombreux cas de décès suite a la prise du vaccin 
							sont avéré. Sanofi niera les fait et ne remboursera pas  les Philippines</p>
							
							<p class='auteur'>Etienne Chourad</p>
						</article>
				<?php
				}
				else
				{
				?>
					<article class='paper'><h1><u>Nos articles sont disponibles pour les utilisateurs connecté.</u></h1>
						<p style='text-align:center;'>Pour vous connecter, <a href='connexion'>cliquez ici</a>.<br/>
						Pour vous inscrire, <a href=inscription'>cliquez ici</a>.</p></article>;
			<?php
				}
			?>
		
		</main>
		
	</body>
</html>
 

 