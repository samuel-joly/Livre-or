 <?php
	session_start();
?> 

<html>
	<head>
		<title>Livre Or</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	<body>
		<?php include('header.php') ?>
		
		<main>
			<?php
				function isLiked($user_id, $comm_id)
				{
					$conn = mysqli_connect("localhost","root","","livreor");
					$request = "SELECT likes FROM commentaires WHERE commentaires.id = ".$comm_id;
					$query = mysqli_query($conn,$request);
					$likes = mysqli_fetch_all($query);
					
					$exploded = explode("~",$likes[0][0]);
					
					$count = 0;
					while($count < count($exploded))
					{
						if($exploded[$count] == $user_id)
						{
							return true;
						}
						$count++;
					}
					
					return false;
				}
				
				function unLike($user_id,$comm_id)
				{
					$conn = mysqli_connect("localhost","root","","livreor");
					$request = "SELECT likes FROM commentaires WHERE commentaires.id = ".$comm_id;
					$query = mysqli_query($conn,$request);
					$likes = mysqli_fetch_all($query);
					
					$exploded = explode("~",$likes[0][0]);
					
					$count = 1;
					while($count < count($exploded))
					{
						if($user_id == $exploded[$count])
						{
							unset($exploded[$count]);
						}
						$count++;
					}
					
					
					
					if(implode("~",$exploded) == "~")
					{
						$request = "UPDATE commentaires SET likes ='' WHERE commentaires.id = ".$comm_id;
					}
					else
					{
						$request = "UPDATE commentaires SET likes ='".implode("~",$exploded)."' WHERE commentaires.id = ".$comm_id;
					}
					
					$query = mysqli_query($conn,$request);
					
				}
				
				function howManyComm($comm_id)
				{
					$conn = mysqli_connect("localhost","root","","livreor");
					$request = "SELECT likes FROM commentaires WHERE commentaires.id = ".$comm_id;
					$query = mysqli_query($conn,$request);
					$likes = mysqli_fetch_all($query);
					
					$count = 0;
					$value = 0;
					while($count < strlen($likes[0][0]))
					{
						if($likes[0][0][$count] == "~")
						{
							$value++;
						}
						$count++;
					}
					if($value == 0)
					{
						return $value;
					}
					else
					{
						return $value-1;						
					}
				}
				
				$conn = mysqli_connect("localhost","root","","livreor");
				$request = "SELECT commentaires.commentaire, utilisateurs.login, date_format(commentaires.date,\"%e %M %Y\"), likes, commentaires.id
				FROM commentaires
				INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id
				ORDER BY commentaires.id DESC ";
				$query = mysqli_query($conn,$request);
				$result = mysqli_fetch_all($query);
				
				
				$idRequest = "SELECT utilisateurs.id FROM utilisateurs WHERE login = '".$_SESSION["login"]."'";
				$idQuery = mysqli_query($conn,$idRequest);
				$idResult = mysqli_fetch_all($idQuery);
				
				$id = $idResult[0][0];
				
				if(isset($_SESSION["connected"]))
				{
					include("commentaire.php");
				}
				else{
					echo "<p id='no-connect'>Seul les connectés ont le droit de poster un commentaire.<br/>
					Pour se connecter <a href='connexion.php'>cliquez ici</a></p>";
				}
				foreach($result as $commentaire => $infos)
				{
					echo "
					<div class='paperOr'>
						<p class='commInfos'><img src='userConnect.png'/> Ecrit par <b>".$infos[1]."</b> le <b>".$infos[2]."</b></p>
						<p class='comm' style=\"padding:10px;\">".$infos[0]."</p>
						<form method=\"post\" action=\"\" style='background-color:transparent;box-shadow:0px 0px 0px 0px;margin:0px;'>
							<label for=\"likeBtn".$infos[4]."\">";

							if(isLiked($id,$infos[4]))
							{
								echo "<div class='likeZone'><img style='cursor:pointer;width:40px;' src=\"fullHeart.png\"/><p>".howManyComm($infos[4])."</p></div>";
							}
							else
							{
								echo "<div class='likeZone'><img style='cursor:pointer;width:40px;' src=\"heart.png\"/><p>".howManyComm($infos[4])."</p></div>";
							}
							
							echo "</label>
				
							<input style='display:none;' type=\"submit\" id=\"likeBtn".$infos[4]."\" name=\"likeBtn".$infos[4]."\">
						</form>
					</div>";
					
					if(isset($_POST["likeBtn".$infos[4]]) && isset($_SESSION["login"]))
					{
						$request = "SELECT likes FROM commentaires WHERE commentaires.id = ".$infos[4];
						$query = mysqli_query($conn,$request);
						$result = mysqli_fetch_all($query);
						$likes = $result[0][0];
						
						if(!isLiked($id,$infos[4]))
						{
							if(empty($likes))
							{
								$request = "UPDATE commentaires SET likes = '~".$id. "~' WHERE commentaires.id = ".$infos[4];
							}
							else
							{
								$request = "UPDATE commentaires SET likes = '" .$likes.$id. "~' WHERE commentaires.id = ".$infos[4];
							}
							$query = mysqli_query($conn,$request);
							$_SESSION["comm".$infos[4]] = true;	
							header("location:livre-or.php");
						}
						else
						{
							unLike($id,$infos[4]);
							header("location:livre-or.php");
						}
					}
				}
				
			?>
		<?php include("footer.php"); ?>
		</main>
	</body>
</html>






