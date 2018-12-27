<?php
class chatrooms
{
	private $id;
	private $userid;
	private $msg;
	private $created_at;
	private $dbConn;

	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}


	public function setUserId($userid)
	{
		$this->userid = $userid;
	}
	public function getUserId()
	{
		return $this->userid;
	}

	public function setMsg($msg)
	{
		$this->msg = $msg;
	}
	public function getMsg()
	{
		return $this->msg;
	}

	public function setCreated($created_at)
	{
		$this->created_at = $created_at;
	}
	public function getCreated()
	{
		return $this->created_at;
	}

	public function __construct()
	{
		require_once('DbConnect.php');
		$db = new DbConnect();
		$this->dbConn = $db->connect();
	}

	public function saveChatRoom()
	{
		$stmt = $this->dbConn->prepare('INSERT INTO chatrooms VALUES(null,:userid,:msg, :created_at)');
		$stmt->bindParam(":userid",$this->userid);
		$stmt->bindParam(":msg",$this->msg);
		$stmt->bindParam(":created_at",$this->created_at);
		
		if($stmt->execute())
		{
			return true; 
		}else{
			return false;
		}
	}


	public function getAllChatRooms()
	{
		$stmt = $this->dbConn->prepare("SELECT c.*,u.name FROM chatrooms as c left join  users as u on c.userid=u.id order by c.id DESC");
		$stmt->execute();
		$chatrooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $chatrooms;
	}
}

?>