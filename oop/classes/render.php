<?php

class Render {

	public static function listIngredients($ingredients) {
		$output = "";
		foreach ($ingredients as $ing) {
			$output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
			$output .= "<br />";
		}
		return $output;
	}

	public static function displayRecipe($recipe) {
		$output = "";
		$output .= $recipe->getTitle() . " by " . $recipe->getSource();
		$output .= "<br />";
		$output .= implode(", ", $recipe->getTags());
		$output .= "<br /><br />";
		$output .= self::listIngredients($recipe->getIngredients());
		$output .= "<br />";
		$output .= implode("<br />", $recipe->getInstructions());
		$output .= "<br />";
		$output .= $recipe->getYield();
		return $output;
	}
}