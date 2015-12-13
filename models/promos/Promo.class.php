<?php
class Promo implements JsonSerializable
{
	private $promo = "";
	private $label = "";

	/**
	 * @return string
	 */
	public function getPromo()
	{
		return $this->promo;
	}

	/**
	 * @param string $promo
	 * Should be called only if promo field is empty (in case of creating a new object tha des not already exist in db.
	 */
	public function setPromo($promo)
	{
		$this->promo = $promo;
	}

	/**
	 * @return string
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * @param string $label
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	public function create()
	{
		global $bdd;

		$sql = "INSERT INTO promo_label (promo, label)
				VALUES (?, ?)";

		$rq = $bdd->prepare($sql);

		return $rq->execute(array(
			$this->getPromo(),
			$this->getLabel()
		));
	}

	public function update()
	{
		global $bdd;

		$sql = "UPDATE promo_label
				SET label = ?
				WHERE promo = ?";

		$rq = $bdd->prepare($sql);

		return $rq->execute(array(
			$this->getLabel(),
			$this->getPromo()
		));
	}

	public function delete()
	{
		global $bdd;

		$bdd->beginTransaction();

		//deleting promo
		$sql = "DELETE FROM promo_label
				WHERE promo = ?";

		$rq = $bdd->prepare($sql);

		$ok = $rq->execute(array(
			$this->getPromo()
		));

		if(!$ok)
		{
			$bdd->rollBack();
			return false;
		}
		/*
		//deleting files related to the deleted promo
		$files = Files::getAllDocumentByPromo($this->getPromo());
		foreach($files as $file)
		{
			$ok = $file->delete();
			if(!$ok)
			{
				$bdd->rollBack();
				return false;
			}
		}*/

		$bdd->commit();
		return true;
	}

	public static function getAllPromos()
	{
		global $bdd;

		$sql = "SELECT *
				FROM promo_label";

		$rq = $bdd->prepare($sql);

		$rq->execute();

		$promos = [];

		while($data = $rq->fetch())
		{
			$promo = new Promo();
			$promo->setPromo($data["promo"]);
			$promo->setLabel($data["label"]);

			$promos[] = $promo;
		}

		return $promos;
	}

	public static function getPromoByPromo($promoToSearch)
	{
		global $bdd;

		$sql = "SELECT *
				FROM promo_label
				WHERE promo = ?";

		$rq = $bdd->prepare($sql);

		$rq->execute(array(
			$promoToSearch
		));

		$data = $rq->fetch();

		$promo = new Promo();
		$promo->setPromo($data["promo"]);
		$promo->setLabel($data["label"]);

		return $promo;
	}

	public static function getPromoByLabel($labelToSearch)
	{
		global $bdd;

		$sql = "SELECT *
				FROM promo_label
				WHERE label = ?";

		$rq = $bdd->prepare($sql);

		$rq->execute(array($labelToSearch));

		$data = $rq->fetch();

		$promo = new Promo();
		$promo->setPromo($data["promo"]);
		$promo->setLabel($data["label"]);

		return $promo;
	}

	function jsonSerialize()
	{
		return [
			"promo" => $this->getPromo(),
			"label" => $this->getLabel()
		];
	}

}
?>