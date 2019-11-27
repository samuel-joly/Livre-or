
			<form id="commForm" action="" method="post">
				<label for="commentaire">Votre commentaire</label>
				<textarea name="commentaire" cols="50" row="20"></textarea>
				
				<input id="valid" type="submit" value="Envoyer" name="submitBtn"/>
			</form> 

<?php
	if(isset($_POST["submitBtn"]))
	{
		$conn = mysqli_connect("localhost","root","","livreor");

		$requestId = "SELECT id FROM utilisateurs WHERE login = '".$_SESSION["login"]."';";
		$queryId = mysqli_query($conn,$requestId);
		$id = mysqli_fetch_all($queryId);
		
		$request = "INSERT INTO commentaires (`id`,`commentaire`,`id_utilisateur`,`date`,`likes`) 
					VALUES (NULL,'".$_POST["commentaire"]."','".$id[0][0]."',CURRENT_DATE,'');";

		if(mysqli_query($conn,$request))
		{
			header("location:livre-or.php");
		}

	}
?>


