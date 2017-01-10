// not prototypical

function Calculator (sum) {
	this.sum = sum;
	this.add = function (value) {
		this.sum += value;
	}
	this.subtract = function (value) {
		this.sum -= value
	}
	this.clear = function () {
		this.sum = 0;
	}
	this.equals = function () {
		return this.sum;
	}
}

var calculate = new Calculator(0);


//object literal
	// var calculator = {
	// 	sum: 0,
	// 	add: function(value) {
	// 		this.sum += value;
	// 	},
	// 	subtract: function(value) {
	// 		this.sum -= value;
	// 	},
	// 	multiply: function(value) {
	// 		this.sum *= value;
	// 	},
	// 	divide: function(value) {
	// 		this.sum /= value;
	// 	},
	// 	clear: function() {
	// 		this.sum = 0;
	// 	}, 
	// 	equals: function() {
	// 		return this.sum;
	// 	}
	// }  