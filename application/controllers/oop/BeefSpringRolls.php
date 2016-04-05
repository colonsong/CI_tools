<?php
class BeefSpringRolls extends SpringRolls
{

	function __construct($insideFood, $sauce)
	{
		$this->setFoodInToTheRolls($insideFood);
		$this->setSauce($sauce);
	}
	public function getContent()
	{
		echo "這一一捲{$this->food}又{$this->sauce}的春捲";
	}
}