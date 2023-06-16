<?php
// Retrieve the form_id from the URL
// error_reporting(E_ERROR | E_PARSE);
if(isset($_GET['form_id'])){
    $form_id = $_GET['form_id'];
}
if(isset($_GET['form_name'])){
    $form_name = $_GET['form_name'];
};
if(isset($_GET['form_age'])){
    $form_age = $_GET['form_age'];
};
if(isset($_GET['form_country'])){
    $form_country = $_GET['form_country'];
};
if(isset($_GET['form_education'])){
    $form_education = $_GET['form_education'];
};
if(isset($_GET['form_work'])){
    $form_work = $_GET['form_work'];
};
if(isset($_GET['form_hobby'])){
    $form_hobby = $_GET['form_hobby'];
};
if(isset($_GET['form_kids'])){
    $form_kids = $_GET['form_kids'];
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Front-end/begin.css">
    <script src="timer.js" defer></script>
    <title>Start</title>
</head>
<body>    
    <script>resetTimer();</script>
    <div id="textcontainer">
        <p>The interview is about to begin.</p>
        <p>You have 20 minutes to answer to all the questions.</p>
        <form action="index.php" method="GET">
            <input type="hidden" name="form_id" value="<?php echo $form_id; ?>">
            <input type="hidden" name="form_name" value="<?php echo $form_name; ?>">
            <input type="hidden" name="form_age" value="<?php echo $form_age; ?>">
            <input type="hidden" name="form_country" value="<?php echo $form_country; ?>">
            <input type="hidden" name="form_education" value="<?php echo $form_education; ?>">
            <input type="hidden" name="form_work" value="<?php echo $form_work; ?>">
            <input type="hidden" name="form_hobby" value="<?php echo $form_hobby; ?>">
            <input type="hidden" name="form_kids" value="<?php echo $form_kids; ?>">
            <button id="button" type="submit">Begin</button>
        </form>
    </div>
</body>
</html>