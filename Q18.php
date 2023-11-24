<!DOCTYPE html>
<html>

<head>
    <title>Sports Registration Form</title>
</head>

<body>
    <h1>Sports Registration Form</h1>
    <form method="POST">
        <label for="playerID">Player ID:</label>
        <input type="number" id="playerID" name="playerID" required>

        <label for="playerName">Player Name:</label>
        <input type="text" id="playerName" name="playerName" required>

        <label for="gameGenre">Game Genre:</label>
        <select id="gameGenre" name="gameGenre" required>
            <option value="">Select a genre</option>
            <option value="Cricket">Cricket</option>
            <option value="Football">Football</option>
            <option value="Basketball">Basketball</option>
        </select>

        <label for="score">Score:</label>
        <input type="number" id="score" name="score" required>

        <button type="submit">Submit</button>
    </form>

    <?php

// Connect to the database

    $conn = new mysqli('localhost', 'root', '', 'endsem');

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Get form data
    $playerID = $_POST['playerID'];
    $playerName = $_POST['playerName'];
    $gameGenre = $_POST['gameGenre'];
    $score = $_POST['score'];

// Insert registration data
    $sql = "INSERT INTO player_data (playerID, playerName, gameGenre, score) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $playerID, $playerName, $gameGenre, $score);

    if ($stmt->execute()) {
        echo "Registration successful.<br>";
    } else {
        echo "Error registering player: " . $stmt->error . "<br>";
    }

// Display players with highest score in cricket
    $sql = "SELECT playerID, playerName, score FROM player_data WHERE gameGenre = 'Cricket' ORDER BY score DESC LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Players with Highest Score in Cricket:</h2>";
        echo "<table>";
        echo "<tr><th>Player ID</th><th>Player Name</th><th>Score</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["playerID"] . "</td>";
            echo "<td>" . $row["playerName"] . "</td>";
            echo "<td>" . $row["score"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found for players with highest score in cricket.<br>";
    }

    $conn->close();
?>


</body>

</html>