<?php
class database
{
	public function connect()
	{
		return new PDO("mysql:host=".config::db_host.";dbname=".config::db_name, config::db_user, config::db_pass);
	}
	
	public function testFunction($id)
	{
		$db = $this->connect();
		$st = $db->prepare("SELECT id FROM users WHERE userid = :id");
		$st->bindParam(':id', $id);
		$st->execute();
		while ($row = $st->fetch(PDO::FETCH_ASSOC))
				$rs[] = $st->$row;
		
		return count($rs)? $rs : array();
	}

}
?>
