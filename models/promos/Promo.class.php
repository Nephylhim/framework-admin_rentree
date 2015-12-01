<?php
class Promo
{
	private $promo = "";
	private $label = "";

	public function __construct($promo = null)
	{}

	/**
	 * @return string
	 */
	public function getPromo()
	{
		return $this->promo;
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
	{}

	public function updated()
	{}

	public function delete()
	{}

	public static function getAllPromos()
	{}
}
?>