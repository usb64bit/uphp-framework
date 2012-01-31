<?php
class database
{
public function connect()
	{
		if (config::dev)
			return new PDO("mysql:host=".config::local_host.";dbname=".config::local_name, config::local_user, config::local_pass);
		else
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
