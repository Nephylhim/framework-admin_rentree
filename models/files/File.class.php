<?php
class Files
{
	private $id = -1;
	private $rang = -1;
	private $promo = "";
	private $libelle = "";
	private $fichier = "";

	public function __construct($id = null)
	{}

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
	{}

	public function update()
	{}

	public function delete()
	{}

	public static function getAllDocumentByPromo($promo)
	{}
}
?>