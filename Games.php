<?php
// Database connection parameters
$servername = "192.168.0.100";
$username = "devforum_db";
$password = "7863XrMYDfkDJSPeaqjx";
$dbname = "devforum_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch games from the database
$sql = "SELECT * FROM games ORDER BY played DESC LIMIT 15";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Page</title>
    <style>
        /* Basic styling for the grid */
        body {
            font-family: Arial, sans-serif;
        }
        .game-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 900px;
            margin: 20px auto;
        }
        .game-item {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .game-item img {
            width: 100%;
            height: auto;
        }
        .game-title {
            font-weight: bold;
            margin: 10px 0 5px;
        }
        .game-info {
            font-size: 0.9em;
            color: #555;
        }
        .game-info span {
            display: block;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Most Popular (Now)</h2>

<div class="game-grid">
    <?php
    if ($result->num_rows > 0) {
        // Output data for each game
        while($row = $result->fetch_assoc()) {
            echo "<div class='game-item'>";
             echo "<img src='/images/GameTestImage.png" . htmlspecialchars($row["image_url"]) . "' alt='Game Image'>";
            echo "<div class='game-title'>" . htmlspecialchars($row["name"]) . "</div>";
            echo "<div class='game-info'>";
            echo "<span>Creator: " . htmlspecialchars($row["creator"]) . "</span>";
            echo "<span>Favorited: " . htmlspecialchars($row["favorited"]) . " times</span>";
            echo "<span>Played: " . htmlspecialchars($row["played"]) . " times</span>";
            echo "<span>" . htmlspecialchars($row["players_online"]) . " players online</span>";
            echo "<span>Updated: " . htmlspecialchars($row["updated_at"]) . "</span>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No games found.</p>";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
