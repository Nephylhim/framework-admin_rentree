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

	public function __construct($id = null)
	{

	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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
	{}

	public function update()
	{}

	public static function getAllDatas()
	{}
}
?>