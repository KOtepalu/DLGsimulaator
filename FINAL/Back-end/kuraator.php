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

    if(isset($_POST["deleting"])){
        if(isset($_POST["to_delete"]) && !empty($_POST["to_delete"])){
             $conn = new mysqli($servername, $username, $password, $dbname);
                  // Check for connection errors
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $stmt=$conn->prepare("UPDATE User_Result SET deleted = 1 WHERE result_id = ?");
            echo $conn->error;
            $stmt->bind_param("i", $_POST["to_delete"]);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    }
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
                                echo '<td><form method="POST"><input type="hidden" name="to_delete" value="' .$result_id  .'"><input type="submit" id="selected_id_' .$result_id .'" name="deleting" value="Delete"></form></td>' ."\n";
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
