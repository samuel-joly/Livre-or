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
					<h1>Sanofi-Lippin</h1>
					<p>En 2016, la Philippine fait une campagne nationale de vaccin contre la dengue. Sanofi reprend 
					le marché et vend pour 50 Million d'€ de vaccin. De nombreux cas de décès suite a la prise du vaccin 
					sont avéré. Sanofi niera les fait et ne remboursera pas  les Philippines</p>
					
					<p class='auteur'>Etienne Chourad</p>
				</article>
				
				<article class='paper'>
					<h1>Lafarge & Daesh</h1>
					<p>Le géant français des matériaux de construction Lafarge a payé des taxes à l'organisation Etat
					Islamique entre 2013 et 2014, via sa cimenterie implantée à Jalabiya, dans le nord de la Syrie.
					La raison ? Financière. Le groupe ne voulait pas prendre le risque que son chiffre d'affaires
					souffre de la guerre.</p>
					
					<p class='auteur'>Edwen Snodward</p>
				</article>
				
				<article class='paper'>
					<h1>Pepsi-Pesos</h1>
					<p>En 1992 Pepsi essaie de récupérer des part du marché Phillipin des mains du géant Coca.
					Ils mettent alors en place le "number Fever", un loto avec 1 million de pesos indonésien(40 000$)
					 à gagner. Le jour du tirage de 1 million, près de 30 million de phillipins 
					(soit presque la moitiée de la pop) avaient joué.
					Le numéro gagnant était le 349. Et c'est alors que pepsi réalisa son erreur. Il y avait 490 
					gagnants à  1 million de pesos. Pepsi ne voulut pas les payer et cela a entrainé une vague 
					de violence dans le pays, menées par le groupe 349 Aliance. 5 personnes auront trouvés la mort dont
					3 employés de pepsi. Aucune charge ne sera retenu contre pepsi car il n'y avait pas de preuves de
					 négligence de leur part.</p>
					
					<p class='auteur'>Glenn Greenwald</p>
				</article>
				<?php
				}
				else
				{
				?>
					<article class='paper'><h1><u>Nos articles sont disponibles pour les utilisateurs connecté.</u></h1>
						<p style='text-align:center;'>Pour vous connecter, <a href='connexion' style="color:green;">cliquez ici</a>.<br/>
						Pour vous inscrire, <a href='inscription' style="color:green;">cliquez ici</a>.</p></article>;
			<?php
				}
			?>
		
			<?php include("footer.php");?>
		</main>
	</body>
</html>