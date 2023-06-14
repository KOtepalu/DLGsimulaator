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

$form_name = $_GET['form_name'];
// Decode the form_name value
$form_name = urldecode($form_name);


if (isset($_GET['form_id'])) {
    $form_id = $_GET['form_id'];
} else {
    $form_id = 0; // Default form_id
}

function getQuestion($questionId){
    global $conn;
    $sql = "SELECT `question_text` FROM `Question` WHERE `question_id` = $questionId";
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

    $sql = "SELECT `answer_text`, `next_question_id`, `answer_score` , `answer_end` FROM `Answer` WHERE `Question_question_id` = $questionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $answers_list[] = [
                "answer_text" => $row["answer_text"],
                "next_question_id" => $row["next_question_id"],
                "answer_score" => $row["answer_score"],
                "answer_end" => $row["answer_end"]
            ];
        }
    }
    return $answers_list;
}

// Check if a question ID is provided in the URL
if (isset($_GET['questionId'])) {
    $questionId = $_GET['questionId'];
} else {
    $questionId = 1; // Default starting question ID
}

$question = getQuestion($questionId);
$answers = getAnswers($questionId);

function roundScore(&$score) {
    if ($score > 100) {
        $score = 100;
    }
    if ($score < 0) {
        $score = 0;
    }
    $finalScore = $score;
}

// Retrieve the points from the URL parameter
if (isset($_GET['points'])) {
    $points = $_GET['points'];
} else {
    $points = 80; // Default starting points
}

roundScore($points);

// Insert data into User_Result table if answer_end is 1
if (isset($_GET['form_id']) && isset($_GET['points']) && $answers[0]['answer_end'] == 1) {
    $form_id = $_GET['form_id'];
    $points = $_GET['points'];
    $sql = "INSERT INTO `User_Result` (`Form_form_id`, `result_score`) VALUES ('$form_id', '$points')";
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}


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
            <div class="time" id="timer"></div>
        </div>
        <img src="../pics/unmute_50.png" alt="mute" class="mute" id="mute" onclick="toggleMute()">
        <div class="container2">
            <div class="kysimused">
                <h2 id="question_text"><?php echo $question; ?></h2>
            </div>
            <!-- <div class="points">
                <h2>Points: <?php echo $points; ?></h2>
            </div> -->
        </div>
		<div class="figures">
			<img src="../pics/ms_neutral1.0.png" alt="figures">
			<img src="../pics/pc_neutral1.0.png" alt="figures">
		</div> 
        <div class="table">
            <div class="button-group">
                <?php foreach ($answers as $answer): ?>
                    <?php
                        $next_question_id = $answer['next_question_id'];
                        $answer_score = $answer['answer_score'];
                        $next_points = $points + $answer_score; // Increase points by answer score
                    ?>
                    <?php if ($answer['answer_end'] == 1): ?>
                        <a href="results.php?points=<?php echo $next_points; ?>">
                            <button class="answer-button"><?php echo $answer['answer_text']; ?></button>
                        </a>
                    <?php else: ?>
                        <a href="index.php?questionId=<?php echo $next_question_id; ?>&points=<?php echo $next_points; ?>">
                            <button class="answer-button"><?php echo $answer['answer_text']; ?></button>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
       </div>
    </div>
</body>
<script>
var isMuted = false;
var muteBtn = document.getElementById("mute");
var muted = "../pics/mute_50_2.png";
var unmuted = "../pics/unmute_50.png";

function toggleMute() {
    const synth = window.speechSynthesis;
    const voices = synth.getVoices();

    if (isMuted) {
        window.speechSynthesis.cancel();
        muteBtn.textContent = 'Unmute';
        muteBtn.src = muted;
        isMuted = false;
    } else {
        var text = document.getElementById('question_text').textContent;
        var utterance = new SpeechSynthesisUtterance(text);
        utterance.voice = voices["Fred"];
        utterance.volume = 0.2;
        window.speechSynthesis.speak(utterance);
        muteBtn.textContent = 'Mute';
        muteBtn.src = unmuted;
        isMuted = true;
    }
}
</script>
</html>