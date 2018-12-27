<!DOCTYPE html>
<html>
<head>
	<title>form</title>
</head>
<body>
	<?php

		if (isset($_POST['join'])) 
		{		session_start();	
				require("db/users.php");
				$objUser = new users;
				$objUser->setName($_POST['uname']);
				$objUser->setEmail($_POST['email']);
				$objUser->setLoginStatus(1);
				$objUser->setLastLogin(date('Y-m-d H:i:s'));
				$userData = $objUser->getUserByEmail();

				if(is_array($userData) && count($userData)>0)
				{
					$objUser->setId($userData['id']);
					if($objUser->updateLoginStatus())
					{
						echo "USER Login";
						$_SESSION['user'][$userData['id']] = $userData;
						header("location:chatroom.php");
					}else{
						echo "Failed to login";
					}
						
				}else
				{

					if ($objUser->save()) 
					{

						$lastId = $objUser->conn->lastInsertId();

						$objUser->setId($lastId);

						$_SESSION['user'][$userData['id']] = (array)$objUser;

						echo "User Regisrted..";
						header("location:chatroom.php");
					}else
					{
						echo "Failed...";
					}
	
				}

				
				

		}

	?>
	<form id="join-room-frm" role="form" method="post" action="">
			<input type="text" name="uname" id="uname" placeholder="Enter name">
			<input type="email" name="email" id="email" placeholder="Enter Email">
			<input type="submit" name="join" id="join" value="Join Chat Room">

	</form>

</body>
</html>