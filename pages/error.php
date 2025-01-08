<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Link CSS -->
    <link rel="stylesheet" href="../css/remain.css">
    <!--Script JS -->
    <script src="../js/script.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Errore</title>
</head>
<body>
    <div class="ans">
        <h2>Errore:</h2>
        <p>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']);
            }
            ?>
        </p>
    </div>

    <div class="btn">
            <button onclick="window.location.href='../index.php'"> Torna alla pagina principale </button>
    </div>

    <div class="btn-theme">
        <button id="theme-toggle">Switch Theme</button> <!-- Pulsante per attivare il tema scuro -->
    </div>

</body>
</html>