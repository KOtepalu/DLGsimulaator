<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="kysimus.css">
</head>
<body>
    <div class="pagecontainer">
        <div class="container1">
            <div class="category">Results</div>
            <div class="figures"></div>
            <div class="time"></div>
        </div>
        <div class="container2">
            <div class="kysimused">
                <h1>Results:</h1>
                <?php
                    if (isset($_GET['points'])) {
                        $points = $_GET['points'];
                        echo "<p>Collected points: $points</p>";
                    } else {
                        echo "<p>No points collected.</p>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>    
</html>