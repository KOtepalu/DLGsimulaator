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

    $sql = "SELECT `answer_text`, `next_question_id` FROM `Answer` WHERE `Question_question_id` = $questionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $answers_list[] = [
                "answer_text" => $row["answer_text"],
                "next_question_id" => $row["next_question_id"]
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
                <?php foreach ($answers as $answer): ?>
                    <a href="index.php?questionId=<?php echo $answer['next_question_id']; ?>"><button class="answer-button"><?php echo $answer['answer_text']; ?></button></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>    
</html>

