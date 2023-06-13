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

$sql = "SELECT `question_end` FROM `Question` WHERE `question_id` = $questionId";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question_end = $row["question_end"];
    // You can perform any necessary actions here for a question end
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
            <div class="category">Intro</div>
            <div class="figures"><img src="sillaots_ja_callaghan.png" alt="figures"></div>
            <div class="time" id="timer">00:00</div>
        </div>
        <img src="../pics/unmute_50.png" alt="mute" class="mute" id="mute" onclick="toggleMute()">
        <div class="container2">
            <div class="kysimused">
                <h1><?php echo $question; ?></h1>
            </div>
            <div class="points">
                <h2>Points: <?php echo $points; ?></h2>
            </div>
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