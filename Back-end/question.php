<?php
$servername = "localhost";
$username = "if22";
$password = "if22pass";
$dbname = "if22_DLGsimulaator";
// Loon AB-ga ühenduse
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$questionId = 1;
function getQuestion($questionId){
    global $conn;
    $sql = "SELECT `question_text` FROM `Questions` WHERE `question_id` = $questionId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["question_text"];
    } else {
        return "Question not found.";
    }
}
function getAnswers($questionId){
    global $conn;
    $answers_list = [];

    $sql = "SELECT `answer_text` FROM `Answers` JOIN `Question_Answer` 
    ON `Answers.answer_id` = `Question_Answer.answer_id` WHERE `question_id` = $questionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $answers_list[] = $row["answer_text"];
        }
    }
    return $answers_list;
}
$question = getQuestion($questionId);
$answers = getAnswers($questionId);
?>

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
				<a href="kysimus0002.html"><button class="answer-button" id="option1"><?php echo $answers[0]; ?></button></a>
				<a href="kysimus0003.html"><button class="answer-button" id="option2"><?php echo $answers[1]; ?></button></a>
				<a href="kysimus0101.html"><button class="answer-button" id="option3">I don't know what you are talking about</button></a>
			</div>
		</div>
	</div>
</body>	
</html>