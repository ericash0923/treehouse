var questions = [
	new Question("How old I am?", ["22","23","24"], "23"),
	new Question("Whats my name?", ["Marius","Petras","Jonas"], "Marius"),
	new Question("Where I live?", ["Kaunas","Vilnius","Klaipeda"], "Vilnius")
];

quiz = new Quiz(questions);

QuizUI.displayNext();