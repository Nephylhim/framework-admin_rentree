<?php
class File implements JsonSerializable
{
	private $id = -1;
	private $rang = -1;
	private $promo = "";
	private $libelle = "";
	private $fichier = "";

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	private function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getRang()
	{
		return $this->rang;
	}

	/**
	 * @param int $rang
	 */
	public function setRang($rang)
	{
		$this->rang = $rang;
	}

	/**
	 * @return string
	 */
	public function getPromo()
	{
		return $this->promo;
	}

	/**
	 * @param string $promo
	 */
	public function setPromo($promo)
	{
		$this->promo = $promo;
	}

	/**
	 * @return string
	 */
	public function getLibelle()
	{
		return $this->libelle;
	}

	/**
	 * @param string $libelle
	 */
	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;
	}

	/**
	 * @return string
	 */
	public function getFichier()
	{
		return $this->fichier;
	}

	/**
	 * @param string $fichier
	 */
	public function setFichier($fichier)
	{
		$this->fichier = $fichier;
	}

	public function create()
	{
		global $bdd;

		$newFile = basename($this->getFichier());

		if(is_uploaded_file($this->getFichier()))
		{
			echo "true   ";
		}
		else
		{
			echo "false  ";
		}

		echo $this->getFichier()."     ".dirname(__FILE__)."/../../rentree/pdf/".$newFile;
		$ok = move_uploaded_file($this->getFichier(), dirname(__FILE__)."/../../rentree/pdf/".$newFile);

		if(!$ok)
		{
			echo "     argh";
			return false;
		}

		$this->setFichier($newFile);

		$bdd->beginTransaction();

		$sql = "INSERT INTO document(id, rang, promo, libelle, fichier)
				VALUES (NULL, ?, ?, ?, ?)";

		$rq =  $bdd->prepare($sql);

		$ok = $rq->execute(array(
			$this->getRang(),
			$this->getPromo(),
			$this->getLibelle(),
			$this->getFichier()
		));

		if(!$ok)
		{
			$bdd->rollBack();
			return false;
		}

		$sql = "SELECT LAST_INSERT_ID() AS id";

		$rq = $bdd->prepare($sql);

		$ok = $rq->execute();

		if(!$ok)
		{
			$bdd->rollBack();
			return false;
		}

		$data = $rq->fetch();
		$this->setId($data['id']);

		$bdd->commit();
		return true;
	}

	public function update()
	{
		global $bdd;
		$sql = "UPDATE document
				SET rang = ?,
					promo = ?,
					libelle = ?
				WHERE id = ?";

		$rq = $bdd->prepare($sql);

		return $rq->execute(array(
			$this->getRang(),
			$this->getPromo(),
			$this->getLibelle(),
			$this->getId()
		));
	}

	public function delete()
	{
		global $bdd;

		$ok = unlink(dirname(__FILE__)."/../../rentree/pdf/".$this->getFichier());

		if(!$ok)
		{
			return false;
		}

		$sql = "DELETE FROM document
				WHERE id = ?";

		$rq = $bdd->prepare($sql);

		return $rq->execute(array(
			$this->getId()
		));
	}

	public static function getAllDocumentByPromo($promo)
	{
		global $bdd;

		$sql = "SELECT *
				FROM document
				WHERE promo = ?
				ORDER BY rang";

		$rq = $bdd->prepare($sql);

		$rq->execute(array(
			$promo
		));

		$documents = [];

		while($data = $rq->fetch())
		{
			$doc = new File();
			$doc->setId($data["id"]);
			$doc->setRang($data["rang"]);
			$doc->setPromo($data["promo"]);
			$doc->setLibelle($data["libelle"]);
			$doc->setFichier($data["fichier"]);

			$documents[] = $doc;
		}

		return $documents;
	}

	public static function getDocumentById($id)
	{
		global $bdd;

		$sql = "SELECT *
				FROM document
				WHERE id = ?";

		$rq = $bdd->prepare($sql);

		$rq->execute(array(
			$id
		));

		$data = $rq->fetch();

		$doc = new File();
		$doc->setId($data["id"]);
		$doc->setRang($data["rang"]);
		$doc->setPromo($data["promo"]);
		$doc->setLibelle($data["libelle"]);
		$doc->setFichier($data["fichier"]);

		return $doc;
	}

	function jsonSerialize()
	{
		return [
			"id" => $this->getId(),
			"rang" => $this->getRang(),
			"promo" => $this->getPromo(),
			"libelle" => $this->getLibelle(),
			"file" => $this->getFichier()
		];
	}
}
?>