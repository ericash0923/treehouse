var http = require("http");

function displayError(error) {
	console.error(error.message);
}

function displayMessage(name, sky, temperature) {
	var message = "At this time in " + name + " the sky is " + sky + ", temperature seems like " + temperature;
	console.log(message);
}

function weather(city, code) {
	//connect to API api.openweathermap.org/data/2.5/weather?q=London,uk
	var request = http.get("http://api.openweathermap.org/data/2.5/weather?q=" + city + "," + code + "&units=metric&APPID=c1e0c84c0f959efa33c98600266aff3d", function (response) {
		var body = "";

		//read the data
		response.on('data', function (chunk) {
			body += chunk;
		});

		response.on('end', function () {
			if (response.statusCode === 200) {
				try {
					//parse the data
					var api = JSON.parse(body);

					//print the data
					displayMessage(api.name, api.weather[0].main, api.main.temp);
				} catch (error) {
					displayError(error);
				}
			} else {
				console.log("Status Code is not 200");
			}
		});
	});

	request.on("error", displayError);
}

module.exports.get = weather;