<?php 
abstract class SpringRolls
{
	protected $food;
	protected $sauce;
	// 我爸今天買了春捲皮但沒買料所以我要寫一個多型
	protected function  setFoodInToTheRolls($food)
	{
		$this->food = $food;
	}
	protected function  setSauce($sauce)
	{
		$this->sauce = $sauce;
	}

	abstract function getContent();

	
}