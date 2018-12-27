<?php

class users{

	private $id;
	private $name;
	private $email;
	private $login_status;
	private $last_login;
	private $dbConn;


	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}



	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}


	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function getEmail()
	{
		return $this->email;
	}


	public function setLoginStatus($login_status)
	{
		$this->login_status = $login_status;
	}
	public function getLoginStatus()
	{
		return $this->login_status;
	}

	public function setLastLogin($last_login)
	{
		$this->last_login = $last_login;
	}
	public function getLastLogin()
	{
		return $this->last_login;
	}


	public function __construct()
	{
		require_once('DbConnect.php');
		$db = new DbConnect();
		$this->dbConn = $db->connect();
	}

	public function save()
	{

		$sql = "INSERT INTO users(name,email,login_status,last_login) VALUES(:name,:email,:login_status,:last_login)";


		$stmt = $this->dbConn->prepare($sql);
		$stmt->bindParam(":name",$this->name); 
		$stmt->bindParam(":email",$this->email); 
		$stmt->bindParam(":login_status",$this->login_status);
		$stmt->bindParam(":last_login",$this->last_login);
		
		try{

			if($stmt->execute()){
				return true;

			}else
			{
				return false;
			}	

		}catch( Exception $e)
		{
			echo $e->getMessage();
		}

	}

	public function getUserByEmail()
	{
		$stmt = $this->dbConn->prepare("SELECT * FROM users WHERE email=:email");
		$stmt->bindParam(":email",$this->email);
		try{
			if($stmt->execute())
			{
				$user = $stmt->fetch(PDO::FETCH_ASSOC);	
			}
			

		}catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $user;

	}

	public function getUserByid()
	{
		$stmt = $this->dbConn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->bindParam(":id",$this->id);
		try{
			if($stmt->execute())
			{
				$user = $stmt->fetch(PDO::FETCH_ASSOC);	
			}
			

		}catch(Exception $e)
		{
			echo $e->getMessage();
		}

		return $user;

	}

	public function updateLoginStatus()
	{

		$stmt = $this->dbConn->prepare("UPDATE users SET login_status=:login_status,last_login=:last_login where id=:id");
		$stmt->bindParam(":login_status",$this->login_status);
		$stmt->bindParam(":last_login",$this->last_login);
		$stmt->bindParam(":id",$this->id);

		try{

			if($stmt->execute())
			{
				return true; 
			}else
			{
				return false;
			}

		}catch(Exception $e)
		{
			echo $e->getMessage();
		}



	}
	public function getAllUsers()
	{
		$stmt = $this->dbConn->prepare("SELECT * FROM users");
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $users;
	}
}

?>