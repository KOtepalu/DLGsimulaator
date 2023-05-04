<?php
	//require_once "../../config.php";

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
	    
			$conn = new mysqli($GLOBALS["server_host"], $GLOBALS["server_user_name"], $GLOBALS["server_password"], $GLOBALS["database"]);
			$conn->set_charset("utf8");
			$stmt = $conn->prepare("INSERT INTO DLGsimulaator (fname, fage, fcountry, feducation, fwork, fhobby, fkids) VALUES (?, ?, ?, ?, ?, ?, ?)");
			echo $conn->error;
			$stmt->bind_param("sissssi", $form_name, $form_age, $form_country, $form_education, $form_work, $form_hobby, $form_kids);
			if($stmt->execute()){
				#echo"Kõik on korras";
			}
	    }
	    $stmt->close();
	    $conn->close();
	}