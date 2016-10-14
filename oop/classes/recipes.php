<?php 
class Recipe {

	public $title;
	public $ingredients = array();
	public $instructions = array();
	public $yield;
	public $tag = array();
	public $source = "Marius Zaleskis";
	
	public function displayRecipe() {
		return $this->title . " by " . $this->source;
	}
}

$recipe1 = new Recipe();
$recipe1->source = "Tadas Blinda";
$recipe1->title = "My first recipe";

$recipe2 = new Recipe();
$recipe2->source = "Jonas Balvonas";
$recipe2->title = "My second recipe";

echo $recipe1->displayRecipe() . "<br />";
echo $recipe2->displayRecipe();

//var_dump($recipe1);

?>