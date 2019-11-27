<?php
	session_start();
	
	
	function isLiked($login, $conn, $comm_id)
	{
		$conn = mysqli_connect("localhost","root","","livreor");
		$request = "SELECT likes FROM commentaires WHERE commentaires.id = ".$comm_id;
		$query = mysqli_query($conn,$request);
		$likes = mysqli_fetch_all($query);
		var_dump($likes);
		
		$count = 0;
		while($count < strlen($likes[0][0]))
		{
			$save = "";
			if($likes[0][0][$count-1] == "~")
			{
				while($likes[0][0][$count] != "~")
				{
					$save = $save.$likes[0][0][$count];
					$count++;
				}
			}
			$count++;
			
			if($save == $login)
			{
				return true;
			}
			
		}
		return false;	
	}
	
	function howManyComm($comm_id)
	{
		$conn = mysqli_connect("localhost","root","","livreor");
		$request = "SELECT likes FROM commentaires WHERE commentaires.id = ".$comm_id;
		$query = mysqli_query($conn,$request);
		$likes = mysqli_fetch_all($query);
		var_dump($likes);
		
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
		return $value-1;	
	}
	
	echo howManyComm(21);
	
?>