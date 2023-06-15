<?php
// Retrieve the form_id from the URL
$form_id = $_GET['form_id'];


$form_name = $_GET['form_name'];
$form_age = $_GET['form_age'];
$form_country = $_GET['form_country'];
$form_education = $_GET['form_education'];
$form_work = $_GET['form_work'];
$form_hobby = $_GET['form_hobby'];
$form_kids = $_GET['form_kids'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
</head>
<body>
    <h1>Welcome to the Interview Simulator!</h1>
    <p>Your form has been submitted successfully.</p>
    <form action="index.php" method="GET">
        <input type="hidden" name="form_id" value="<?php echo $form_id; ?>">
        <input type="hidden" name="form_name" value="<?php echo $form_name; ?>">
        <input type="hidden" name="form_age" value="<?php echo $form_age; ?>">
        <input type="hidden" name="form_country" value="<?php echo $form_country; ?>">
        <input type="hidden" name="form_education" value="<?php echo $form_education; ?>">
        <input type="hidden" name="form_work" value="<?php echo $form_work; ?>">
        <input type="hidden" name="form_hobby" value="<?php echo $form_hobby; ?>">
        <input type="hidden" name="form_kids" value="<?php echo $form_kids; ?>">
        <button type="submit">Begin</button>
    </form>
</body>
</html>
