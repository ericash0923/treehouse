function Quiz (questions) {
	this.questions = questions;
	this.score = 0;
	this.currentQuestionIndex = 0;
}

Quiz.prototype.getCurrentQuestion = function () {
	return this.questions[this.currentQuestionIndex];
}

Quiz.prototype.guess = function (answer) {
	if (this.getCurrentQuestion().isCorrectAnswer(answer)) {
		this.score++;
	}
	this.currentQuestionIndex++;
}

Quiz.prototype.hasEnded = function () {
	return this.currentQuestionIndex >= this.questions.length;
}