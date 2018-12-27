<!DOCTYPE html>
<html>
<head>
	<title>chatrrom</title>
	<script type="text/javascript" src="jquery.min.js"></script>
	<style type="text/css">
		tr,td,th{
			border: 1px solid ;
		}
	</style>
</head>
<body>
		<?php
			session_start();
			require_once("db/users.php");
			require_once("db/chatrooms.php");
			
			$objChatroom = new chatrooms;
			$chatrooms = $objChatroom->getAllChatRooms();

			$objUser = new users;
			$users = $objUser->getAllUsers(); 

		?>


			<table>
				<tr>

					<th>
						<?php
							foreach ($_SESSION['user'] as  $key => $user ) 
							{
								$userId = $key;
								echo '<input type="hidden" name="userId" id="userId" value="'.$key.'">';
								echo $user['name'].' -- '.$user['email']; 
							}
						?>
					</th>
				</tr>
				<tr>
					<th>Users</th>
				</tr>
				<tbody>
					<?php
						foreach ($users as $key => $user) 
						{
							if(!isset($_SESSION['user'][$user['id']]))
							{
								echo "<tr><td>".$user['name']."</td>";
							echo "<td>".$user['login_status']."</td>";
							echo "<td>".$user['last_login']."</td></tr>";	
							}
							

						}
					?>
				
			</table>

			<form method="post" id="chat-room-form" action="">
				<textarea id="msg" name="msg"></textarea>
				<input type="button" name="send"  id="send" value="Send">

			</form>
			<div >
				<table id="chat">
					<?php
						foreach ($chatrooms as $key => $chat) 
						{
							if(!isset($_SESSION['user'][$chat['userid']]))
							{
								$from = "Me";
							}else
							{
								$from  = $chat['name'];
							}

							echo "<tr><td><div>".$from."</div></td><td><div>".$chat['msg']."</div></td><td><div>".$chat['created_at']."</div></td></tr>";;
						}
					?>
				</table>			
			</div>

</body>
</html>
<script type="text/javascript">
		
		$(document).ready(function(){

			var conn = new WebSocket("ws://localhost:8080");
			conn.onopen = function(e)
			{
				console.log("Conection Done");
			};

			conn.onmessage = function(e)
			{
				console.log(e.data);
				var data = JSON.parse(e.data);
				var row = "<tr><td><div>"+data.from+"</div></td><td><div>"+data.msg+"</div></td><td><div>"+data.dt+"</div></td></tr>";

				$("#chat").prepend(row);
			};

			$("#send").click(function(){


				var msg = $("#msg").val();
				var userId = $("#userId").val();
				var data = {

					userId:userId,
					msg:msg
				}

				conn.send(JSON.stringify(data));
				 $("#msg").val('');
			});


		});


</script>