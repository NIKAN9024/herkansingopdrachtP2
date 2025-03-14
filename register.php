<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $favorite_game = $_POST["favorite_game"];

    if (empty($username) || empty($email) || empty($favorite_game)) {
        $error = "Alle velden moeten ingevuld zijn!";
    } elseif (strlen($username) < 3 || strlen($username) > 15) {
        $error = "Gebruikersnaam moet tussen 3 en 15 tekens lang zijn.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ongeldig e-mailadres!";
    } else {
        $success = "Registratie succesvol!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lid worden</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'nav.php'; ?>

    <h2>Lid worden</h2>

    <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>
    <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>

    <form method="POST" action="">
        <label>Gebruikersnaam:</label>
        <input type="text" name="username" required>
        
        <label>E-mailadres:</label>
        <input type="email" name="email" required>
        
        <label>Favoriete game:</label>
        <select name="favorite_game">
            <option value="">Selecteer een game</option>
            <option value="GTA 5">Grand Theft Auto 5</option>
            <option value="AC Syndicate">Assassin’s Creed Syndicate</option>
            <option value="Sleeping Dogs">Sleeping Dogs</option>
            <option value="Watch Dogs 2">Watch Dogs 2</option>
            <option value="HOI4">Hearts of Iron 4</option>
        </select>

        <button type="submit">Registreer</button>
    </form>

</body>
</html>