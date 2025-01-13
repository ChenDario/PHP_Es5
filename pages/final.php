<?php 
session_start();
$students_data = $_SESSION['students'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Link CSS -->
    <link rel="stylesheet" href="../css/remain.css">
    <link rel="stylesheet" href="../css/final.css">
    <!--Script JS -->
    <script src="../js/script.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Scrutinio Finale </title>
</head>
<body>
        
    <div class="title">
        <h1>
            TABELLONE SCRUTINIO
        </h1>
    </div>

    <div class="ans">
        <?php
            // Itera correttamente sull'array degli studenti
            foreach ($students_data as $student) {
                $ans = "";
                if(!$student['esito']){
                    $ans = "<strong> Non ammesso/a </strong>";
                } elseif (count($student['insufficienze']) > 0 && count($student['insufficienze']) < 3) {
                    $ans = "<strong> Ammesso/a </strong>con debiti a " . implode(', ', $student['insufficienze']);
                } else {
                    $ans = "<strong> Ammesso/a </strong>";
                }
                // Accedi correttamente ai dati degli studenti
                echo htmlspecialchars($student['nome']) . ": " . $ans . "<br>";
            }
        ?>
    </div>

    <div class="btn">
        <button onclick="window.location.href='reset.php'"> Cancella Tutti i Dati </button>
        <button onclick="window.location.href='../index.php'"> Inserire un nuovo studento </button>
    </div>

    <div class="btn-theme">
        <button id="theme-toggle">Switch Theme</button> <!-- Pulsante per attivare il tema scuro -->
    </div>

</body>
</html>