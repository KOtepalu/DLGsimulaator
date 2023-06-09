<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="kysimus.css">
</head>
<body>
	<div class="pagecontainer">
		<div class="container1">
			<div class ="category">Intro</div>
			<div class ="figures"><img src="sillaots_ja_callaghan.png" alt="figures"></div>
			<div class ="time" id="timer">00:00</div>
		</div>
		<div class="container2">
			<div class ="kysimused">
				<h1>
                    <?php echo $question; ?>
                </h1>
			</div>
			<div class="button-group">
				<button class="answer-button" id="option1"><?php echo $answers[0]; ?></button></a>
				<a href="kysimus0003.html"><button class="answer-button" id="option2"><?php echo $answers[1]; ?></button></a>
				<a href="kysimus0101.html"><button class="answer-button" id="option3">I don't know what you are talking about</button></a>
			</div>
		</div>
	</div>
</body>	
</html>