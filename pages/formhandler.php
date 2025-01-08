<?php
    session_start();
    // Inizializzazione sessione per memorizzare gli studenti
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = [];
    }

    // Funzione per determinare l'esito dello studente
    function calcolaEsito($insufficienti) {
        return $insufficienti < 3;
    }

    // Gestione dell'invio del form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['name']);
        $genere = $_POST['gender'];
        $materie = $_POST['subjects'] ?? [];
        $insufficienze = count($materie);

        // Validazione
        if (empty($nome)) {
            $_SESSION['error_message'] = "<strong>Manca il nome dello studente </strong>";
            header("Location: error.php");
            exit;
        }

        // Controllo duplicati
        foreach ($_SESSION['students'] as $studente) {
            if ($studente['nome'] === $nome) {
                $_SESSION['error_message'] = "<strong> Studente già presente </strong>";
                header("Location: error.php");
                exit;
            }
        }

        // Calcolo esito
        $esito = calcolaEsito($insufficienze);

        // Salvataggio dello studente
        $_SESSION['students'][] = [
            'nome' => $nome,
            'genere' => $genere,
            'insufficienze' => $materie,
            'esito' => $esito
        ];
    }
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
    <title> Esito Scrutinio </title>
</head>
<body>
    <div class = "ans">
        <p>
            Lo Studente 
                <?php 
                    $ans = "";
                    if(!$esito){
                        $ans = "Non è estato ammesso/a";
                    } elseif($insufficienze > 0) {
                        $ans = "Ammesso/a con debiti a " . "<u>" . implode(', ' , $materie) . "</u>";
                    } else {
                        $ans = "È estato ammesso/a";
                    }

                    echo $nome . " " . $ans; 
                ?>
        </p>
    </div>

    <div class = "btn">
        <button onclick="window.location.href='../index.php'"> Inserire un nuovo studento </button>
        <button onclick="window.location.href='final.php'"> Termina Scrutinio </button>
    </div>

    <div class="btn-theme">
        <button id="theme-toggle">Switch Theme</button> <!-- Pulsante per attivare il tema scuro -->
    </div>

</body>
</html>
