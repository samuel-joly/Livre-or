
			<form action="" method="post">
				<label for="commentaire">Votre commentaire</label>
				<textarea name="commentaire" cols="50" row="20"></textarea>
				
				<input type="submit" value="envoyer" name="submitBtn"/>
			</form> 

<?php
	if(isset($_POST["submitBtn"]))
	{
		$conn = mysqli_connect("localhost","root","","livreor");

		$requestId = "SELECT id FROM utilisateurs WHERE login = '".$_SESSION["login"]."';";
		$queryId = mysqli_query($conn,$requestId);
		$id = mysqli_fetch_all($queryId);

		$request = "INSERT INTO commentaires (`id`,`commentaire`,`id_utilisateur`,`date`) 
					VALUES (NULL,'".$_POST["commentaire"]."','".$id[0][0]."',CURRENT_DATE);";

		if(mysqli_query($conn,$request))
		{
			header("location:livre-or.php");
		}

	}
?>

<style>
	
	form
	{
		width:30%;
		display:flex;
		flex-direction:column;
		
		margin:auto;
		margin-top:10%;
	}

	textarea
	{
		width:100%;
		height:200px;
	}
 
 </style>
