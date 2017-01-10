//protypical

function Dice (sides) {
	this.sides = sides;
}

Dice.prototype.roll = function () {
		var randomNumber = Math.floor(Math.random() * this.sides) + 1;
		return randomNumber;
	}

var dice = new Dice(6);
var dice2 = new Dice(10);
console.log(dice.roll === dice2.roll);

//object literal
	// var dice = {
	// 	sides : 6,
	// 	roll : function () {
	// 		var randomNumber = Math.floor(Math.random() * this.sides) + 1;
	// 		return randomNumber;
	// 	}
	// }