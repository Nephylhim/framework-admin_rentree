<?php
class Data
{
	private $id = -1;
	private $identifiant = "";
	private $nom_fils = "";
	private $prenom_fils = "";
	private $ddn_fils = "";
	private $tel_mobile = "";
	private $courriel = "";
	private $date = "";
	private $ip = "";

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
	 * @return string
	 */
	public function getIdentifiant()
	{
		return $this->identifiant;
	}

	/**
	 * @param string $identifiant
	 */
	public function setIdentifiant($identifiant)
	{
		$this->identifiant = $identifiant;
	}

	/**
	 * @return string
	 */
	public function getNomFils()
	{
		return $this->nom_fils;
	}

	/**
	 * @param string $nom_fils
	 */
	public function setNomFils($nom_fils)
	{
		$this->nom_fils = $nom_fils;
	}

	/**
	 * @return string
	 */
	public function getPrenomFils()
	{
		return $this->prenom_fils;
	}

	/**
	 * @param string $prenom_fils
	 */
	public function setPrenomFils($prenom_fils)
	{
		$this->prenom_fils = $prenom_fils;
	}

	/**
	 * @return string
	 */
	public function getDdnFils()
	{
		return $this->ddn_fils;
	}

	/**
	 * @param string $ddn_fils
	 */
	public function setDdnFils($ddn_fils)
	{
		$this->ddn_fils = $ddn_fils;
	}

	/**
	 * @return string
	 */
	public function getTelMobile()
	{
		return $this->tel_mobile;
	}

	/**
	 * @param string $tel_mobile
	 */
	public function setTelMobile($tel_mobile)
	{
		$this->tel_mobile = $tel_mobile;
	}

	/**
	 * @return string
	 */
	public function getCourriel()
	{
		return $this->courriel;
	}

	/**
	 * @param string $courriel
	 */
	public function setCourriel($courriel)
	{
		$this->courriel = $courriel;
	}

	/**
	 * @return string
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param string $date
	 */
	public function setDate($date)
	{
		$this->date = $date;
	}

	/**
	 * @return string
	 */
	public function getIp()
	{
		return $this->ip;
	}

	/**
	 * @param string $ip
	 */
	public function setIp($ip)
	{
		$this->ip = $ip;
	}

	public function create()
	{
		global $bdd;

		$bdd->beginTransaction();

		$sql = "INSERT INTO data (id, identifiant, nom_fils, prenom_fils, ddn_fils, tel_mobile, courriel, date, ip)
				VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

		$rq = $bdd->prepare($sql);

		$ok = $rq->execute(array(
			$this->getIdentifiant(),
			$this->getNomFils(),
			$this->getPrenomFils(),
			$this->getDdnFils(),
			$this->getTelMobile(),
			$this->getCourriel(),
			$this->getDate(),
			$this->getIp()
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

		$sql = "UPDATE data
				SET identifiant = ?,
					nom_fils = ?,
					prenom_fils = ?,
					ddn_fils = ?,
					tel_mobile = ?,
					courriel = ?
				WHERE id = ?";

		$rq = $bdd->prepare($sql);

		return $rq->execute(array(
			$this->getIdentifiant(),
			$this->getNomFils(),
			$this->getPrenomFils(),
			$this->getDdnFils(),
			$this->getTelMobile(),
			$this->getCourriel(),
			$this->getId()
		));
	}

	public function delete()
	{
		global $bdd;

		$sql = "DELETE FROM data
				WHERE id = ?";

		$rq = $bdd->prepare($sql);

		return $rq->execute(array(
			$this->getId()
		));
	}

	public static function getAllDatas()
	{
		global $bdd;

		$sql = "SELECT *
				FROM data";

		$rq = $bdd->prepare($sql);

		$rq->execute();

		$datas = [];

		while($dat = $rq->fetch())
		{
			$data = new Data();
			$data->setId($dat["id"]);
			$data->setIdentifiant($dat["identifiant"]);
			$data->setNomFils($dat["nom_fils"]);
			$data->setPrenomFils($dat["prenom_fils"]);
			$data->setDdnFils($dat["ddn_fils"]);
			$data->setTelMobile($dat["tel_mobile"]);
			$data->setCourriel($dat["courriel"]);
			$data->setDate($dat["date"]);
			$data->setIp($dat["ip"]);

			$datas[] = $data;
		}

		return $datas;
	}

	public static function getDataById($id)
	{
		global $bdd;

		$sql = "SELECT *
				FROM data
				WHERE id = ?";

		$rq = $bdd->prepare($sql);

		$rq->execute(array(
			$id
		));

		$dat = $rq->fetch();

		$data = new Data();
		$data->setId($dat["id"]);
		$data->setIdentifiant($dat["identifiant"]);
		$data->setNomFils($dat["nom_fils"]);
		$data->setPrenomFils($dat["prenom_fils"]);
		$data->setDdnFils($dat["ddn_fils"]);
		$data->setTelMobile($dat["tel_mobile"]);
		$data->setCourriel($dat["courriel"]);
		$data->setDate($dat["date"]);
		$data->setIp($dat["ip"]);

		return $data;
	}

	public static function deleteAllDatas()
	{
		global $bdd;

		$sql = "DELETE FROM data";

		$rq = $bdd->prepare($sql);

		return $rq->execute();
	}
}
?>