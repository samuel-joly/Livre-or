<?php
	session_start();
?> 
 
<html>
	<head>
		<title>Présentation Entreprise</title>
		<meta charset="utf-8"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		
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
			?>
		
		</main>
		
	</body>
</html>
 
 
 
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