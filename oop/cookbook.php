<?php
include "classes/recipes.php";
include "classes/render.php";

$recipe1 = new Recipe("my first recipe");
$recipe1->setSource = "Tadas Blinda";
$recipe1->addIngredient("egg", 5);
$recipe1->addIngredient("carrot", 2, "small");

$recipe1->addInstruction("This is my first instruction");
$recipe1->addInstruction("This is my second instruction");

$recipe1->addTag("Breakfast");
$recipe1->addTag("Dinner");

$recipe1->setYield("3 servings");

echo $recipe1;
echo new Render();