<?php
    $servername = "localhost";
    $username = "if22";
    $password = "if22pass";
    $dbname = "if22_DLGsimulaator";

    $comment_error = null;
    
/*     function delete_result($id){
        echo $id;
    } */

    var_dump($_POST);

    if(isset($_POST["selected_id_' .$result_id .'"])){
        if(isset($_POST[""]))


        $conn = new mysqli($servername, $username, $password, $dbname);

         // Check for connection errors
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT result_id, deleted FROM User_Result WHERE result_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->bind_result($resultid_from_db, $deleted_from_db);
        $stmt->execute();
        if($stmt->fetch()){
            if($resultid_from_db == $_POST["' .$result_id .'"]){
                $stmt->prepare("UPDATE User_Result SET deleted = 1 WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
        }

    }
    
    //kontrollime id inputi vormist
    /*if(isset()){
        if(isset($_POST["id_input"]) and !empty($_POST["id_input"])){
            $id = $_POST["id_input"];
        } else {
            $comment_error = "id jäi lisamata";
        }

        if(empty($comment_error)){
            // Connect to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check for connection errors
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT result_name FROM User_Result WHERE result_id = ?");
            $stmt->bind_param("i", $result_id);
            $stmt->bind_result($userid_from_db);
            $stmt->execute();
            if($stmt->fetch()){
                if($userid_from_db == $_SESSION["user_id"]){
                    //$stmt->close();
                    $stmt->prepare("UPDATE User_Result SET result_name = NULL WHERE result_id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->close();
                    $conn->close();
                    exit();
                }
            }
            echo $stmt->error;
            $stmt->close();
            
            // Close the database connection
            $conn->close();
    
        }
    }*/


?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="edetabel.css">
    <link rel="stylesheet" href="tabel.css">    
</head>
<body>
    <div class="pagecontainer">
        <div class="maincontent">
            <div class="header"><h1>LEADERBOARD</h1></div>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Time</th>
                        <!--<th>ID</th>-->
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $servername = "localhost";
                        $username = "if22";
                        $password = "if22pass";
                        $dbname = "if22_DLGsimulaator";

                        // Connect to the database
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check for connection errors
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Retrieve the results from the User_Result table and sort them by score in descending order,
                        // and if scores are the same, sort by result_time in ascending order
                        //$results_query = "SELECT result_id, result_score, result_time, result_name FROM User_Result ORDER BY result_score DESC, result_time ASC LIMIT 10";
                        //$results_result = $conn->query($results_query);
                        $stmt = $conn->prepare("SELECT result_id, result_score, result_time, result_name, deleted FROM User_Result WHERE deleted = 0 ORDER BY result_score DESC, result_time ASC LIMIT 10");
                        $stmt->bind_result($result_id, $result_score, $result_time, $result_name, $deleted);

                        // Display the results
                        if ($stmt->execute()) {
                            $rank = 1;
                            while ($stmt->fetch()) {
                                echo "<tr> \n";
                                echo "<td>" . $rank . "</td>";
                                echo "<td>" . $result_name . "</td>";
                                echo "<td>" . $result_score . "</td>";
                                echo "<td>" . $result_time . "</td>";
                                //echo "<td>" . $result_id . "</td>";
                                echo '<td><form method="POST"><input type="hidden" name="to_delete" value="' .$result_id  .'"><input type="submit" id="selected_id_' .$result_id .'" name="selected_id_' .$result_id .'" value="Delete"></form></td>' ."\n";
                                echo "</tr> \n";
                                $rank++;
                            }
                        } else {
                            echo "<tr><td colspan='4'>No results found.</td></tr>";
                        }

                        // Close the database connection
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>