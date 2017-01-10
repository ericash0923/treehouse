var QuizUI = {
	displayNext: function () {
		if (quiz.hasEnded()) {
			this.displayScore();
		} else {
			this.displayQuestion();
			this.displayChoices();
			this.displayProgress();
		}
	},
	displayQuestion: function () {
		this.insertHTML('question', quiz.getCurrentQuestion().text);
	},
	displayChoices: function () {
		var choices = quiz.getCurrentQuestion().choices;

		for (var i = 0; i < choices.length; i++) {
			this.insertHTML('choice' + i, choices[i]);
			this.guessHandler('guess' + i, choices[i]);
		}
	},
	displayProgress: function () {
		var progressText = "5 klausimas iš 35";
		this.insertHTML('progress', progressText);
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
		var gameoverH1 = "Game Over";
		var gameoverButtons = "Your score is: " + quiz.score;
		this.insertHTML('question', gameoverH1);
		this.insertHTML('buttons', gameoverButtons);

	}

}