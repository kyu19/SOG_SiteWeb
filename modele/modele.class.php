<?php

class Modele {

	private $unPdo, $uneTable;

	public function __construct($serveur, $bdd, $user, $mdp) 
	{
		$this->unPdo = null;
		try 
		{
			$this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd.";charset=utf8", $user, $mdp);
		} 
		catch (PDOException $exp) 
		{
			die("Erreur de connexion à la base de données : " . $exp->getMessage());
		}
	}

	public function setTable($uneTable) 
	{
		$this->uneTable = $uneTable;
	}

	public function selectAll() 
	{
		$requete = "SELECT * FROM ".$this->uneTable;
		$select = $this->unPdo->prepare($requete);
		$select->execute();
		return $select->fetchAll();
	}

	public function insert($tab) 
	{
		$champs = array();
		$donnees = array();
		foreach ($tab as $key => $value) 
		{
			$champs[] = ":".$key;
			$donnees[":".$key] = $value;
		}
		$chaineChamps = implode(" , ", $champs);
		$requete = "INSERT INTO ".$this->uneTable." VALUES (null,".$chaineChamps.")";
		$insert = $this->unPdo->prepare($requete);
/*		echo $requete;
		var_dump($donnees);*/
		$insert->execute($donnees);
	}

	public function insertnonull($tab) 
	{
		$champs = array();
		$donnees = array();
		foreach ($tab as $key => $value) 
		{
			$champs[] = ":".$key;
			$donnees[":".$key] = $value;
		}
		$chaineChamps = implode(" , ", $champs);
		$requete = "INSERT INTO ".$this->uneTable." VALUES (".$chaineChamps.")";
		$insert = $this->unPdo->prepare($requete);
/*		echo $requete;
		var_dump($donnees);*/
		$insert->execute($donnees);
	}

	public function selectSearch($mot, $tab) 
	{
		$donnees = array(":mot"=>"%".$mot."%");
		$champs = array();
		foreach ($tab as $key) 
		{
			$champs[] = $key." LIKE :mot ";
		}
		$chaineWhere = implode(" or ", $champs);
		$requete = "SELECT * FROM ".$this->uneTable." WHERE ".$chaineWhere;
		$select = $this->unPdo->prepare($requete);
		$select->execute($donnees);
		return $select->fetchAll();
	}

	public function delete($where) 
	{
		$donnees = array();
		$champs = array();
		foreach ($where as $key => $value) 
		{
			$champs[] = $key." = :".$key;
			$donnees[":".$key] = $value;
		}
		$chaineWhere = implode(" AND ", $champs);
		$requete = "DELETE FROM ".$this->uneTable." WHERE ".$chaineWhere;
		$delete = $this->unPdo->prepare($requete);
		$delete->execute($donnees);
	}

	public function count() 
	{
		$requete = "SELECT count(*) as nb FROM ".$this->uneTable;
		$select = $this->unPdo->prepare($requete);
		$select->execute();
		return $select->fetch();
	}

	public function selectWhere($where) 
	{
		$donnees = array();
		$champs = array();
		foreach ($where as $key => $value) 
		{
			$champs[] = $key." = :".$key;
			$donnees[":".$key] = $value;
		}
		$chaineWhere = implode(" AND ", $champs);
		$requete = "SELECT * FROM ".$this->uneTable." WHERE ".$chaineWhere;
		$select = $this->unPdo->prepare($requete);
		$select->execute($donnees);
		return $select->fetch();
	}

	public function update($tab, $where) 
	{
		$donnees = array();
		$champs2 = array();
		foreach ($tab as $key => $value) 
		{
			$champs2[] = $key." = :".$key;
			$donnees[":".$key] = $value;
		}
		$chaineChamps = implode(", ", $champs2);
		$champs = array();
		foreach ($where as $key => $value) 
		{
			$champs[] = $key." = :".$key;
			$donnees[":".$key] = $value;
		}
		$chaineWhere = implode(" AND ", $champs);
		$requete = "UPDATE ".$this->uneTable." SET ".$chaineChamps. " WHERE ".$chaineWhere;
		$update = $this->unPdo->prepare($requete);
		$update->execute($donnees);
	}

	public function updateplanning($tab, $where) 
	{
		$donnees = array();
		$champs2 = array();
		foreach ($tab as $key => $value) 
		{
			$champs2[] = $key." = :".$key;
			$donnees[":".$key] = $value;
		}
		$chaineChamps = implode(", ", $champs2);
		$champs = array();
		foreach ($where as $key => $value) 
		{
			$champs[] = $key." = :".$key."1";
			$donnees[":".$key."1"] = $value;
		}
		$chaineWhere = implode(" AND ", $champs);
		$requete = "UPDATE ".$this->uneTable." SET ".$chaineChamps. " WHERE ".$chaineWhere;
		$update = $this->unPdo->prepare($requete);
		$update->execute($donnees);
	}

}

?>