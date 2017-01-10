//Create questions
var questions = [
	new Question("How old am I?", ["23", "24"], "23"),
	new Question("What's my name?", ["Jonas", "Marius"], "Marius")
];

//Create Quiz
var quiz = new Quiz(questions);

//Display Quiz
QuizUI.displayNext();