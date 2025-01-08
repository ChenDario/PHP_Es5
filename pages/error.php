<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Errore</title>
</head>
<body>
    <div>
        <h2>Errore:</h2>
        <p>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            }
            ?>
        </p>
        <button onclick="window.location.href='../index.php'">Torna alla pagina principale</button>
    </div>
</body>
</html>