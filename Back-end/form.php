<?php
$servername = "localhost";
$username = "if22";
$password = "if22pass";
$dbname = "if22_DLGsimulaator";

$form_name = null;
$form_age = null;
$form_country = null;
$form_education = null;
$form_work = null;
$form_hobby = null;
$form_kids = null;

//ankeedi sisu salvestamine
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(isset($_POST["form_submit"])){
	        $form_name = $_POST["name_input"];
	        $form_age = $_POST["age_input"];
	        $form_country = $_POST["country_input"];
            $form_education = $_POST["education_input"];
	        $form_work = $_POST["work_input"];
	        $form_hobby = $_POST["hobby_input"];
            $form_kids = $_POST["kids_input"];
	    
			$conn = new mysqli($servername, $username, $password, $dbname);
			$conn->set_charset("utf8");
			$stmt = $conn->prepare("INSERT INTO Form (fname, fage, fcountry, feducation, fwork, fhobby, fkids) VALUES (?, ?, ?, ?, ?, ?, ?)");
			echo $conn->error;
			$stmt->bind_param("sissssi", $form_name, $form_age, $form_country, $form_education, $form_work, $form_hobby, $form_kids);
			if($stmt->execute()){
				echo "Kõik on korras";
			}
	    }
	    $stmt->close();
	    $conn->close();
	}
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLG sisseastumisintervjuu simulaator</title>
    <link rel="stylesheet" href="general.css">
    <link rel="stylesheet" href="ankeet.css">
    <script src="ankeet.js" defer></script>
</head>
<body>
    <div id="textcontainer">
        <p>For a better interview experience please fill out this form</p>
        <form method="POST">
            <label for="name_input">Name:</label>
            <input type="text" id="name_input" name="name_input" placeholder="Name" required>

            <label for="age_input">Age:</label>
            <input type="number" id="age_input" name="age_input" placeholder="Age">
            
            <label for="country_input">Country:</label>
            <input type="text" id="country_input" name="country_input" placeholder="Country">
            
            <label for="education_input">Education:</label>
            <input type="text" id="education_input" name="education_input" placeholder="Education">
            
            <label for="work_input">Work:</label>
            <input type="text" id="work_input" name="work_input" placeholder="Work">
            
            <label for="hobby_input">Hobby:</label>
            <input type="text" id="hobby_input" name="hobby_input" placeholder="Hobby">
            
            <label for="kids_input">Kids:</label>
            <input type="number" id="kids_input" name="kids_input" placeholder="Number of Kids">

            <button type="button" id="next" name = "form_submit" onclick="window.location.href='start.html'">NEXT</button>
        </form>
        <a href="start.html"><button id="skip">SKIP</button></a>
    </div>
</body>
</html>