var weather = require("./weather.js");
var cities = process.argv.slice(2);

cities.forEach(weather.get);

// weather.get("Vilnius", "lt");
// weather.get("London", "uk");