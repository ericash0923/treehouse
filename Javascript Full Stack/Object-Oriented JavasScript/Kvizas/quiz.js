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
	return this.currentQuestionIndex === this.questions.length;
}

function Question (text, choices, answer) {
	this.text = text;
	this.choices = choices;
	this.answer = answer;
}

Question.prototype.isCorrectAnswer = function (answer) {
	return this.answer === answer;
}

var QuizUI = {
	displayNext: function () {
		if (quiz.hasEnded()) {
			this.displayScore();
		} else {
			this.displayChoices();
			this.displayQuestion();
			this.displayProgress();
		}

	},
	displayChoices: function () {
		var choices = quiz.getCurrentQuestion().choices;

		for (var i = 0; i < choices.length; i++) {
			this.insertHTML('choice' + i, choices[i]);
			this.guessHandler('guess' + i, choices[i]);

		}
	},
	displayQuestion: function () {
		this.insertHTML('question', quiz.getCurrentQuestion().text);
	},
	guessHandler: function (id, guess) {
		var button = document.getElementById(id);
		button.onclick = function () {
			quiz.guess(guess);
			QuizUI.displayNext();
		}
	},
	insertHTML: function (id, text) {
		var element = document.getElementById(id);
		element.innerHTML = text;
	},
	displayScore: function () {
		var gameOverH1 = "Zaidimas baigtas";
		var gameOverText = "Surinkta tasku:" + quiz.score;
		this.insertHTML('question', gameOverH1);
		this.insertHTML('buttons', gameOverText);
	},
	displayProgress: function () {
		var progress = "Klausimas: " + (quiz.currentQuestionIndex + 1) + " iš " + quiz.questions.length;
		this.insertHTML('progress', progress);
	}
};

var questions = [
	new Question("Koks mano vardas?", ["Marius", "Jonas", "Petras"], "Marius"),
	new Question("Gimtasis miestas?", ["Siauliai", "Jonava", "Kelme"], "Kelme"),
	new Question("Dabar gyvenu?", ["Kaunas", "Klaipeda", "Vilnius"], "Vilnius")
];

quiz = new Quiz(questions);

QuizUI.displayNext();