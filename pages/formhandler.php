<?php
    session_start();
    // Inizializzazione sessione per memorizzare gli studenti
    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = [];
    }

    // Funzione per determinare l'esito dello studente
    function calcolaEsito($insufficienti) {
        if($insufficienti >= 3){
            return false;
        } else {
            return true;
        }
    }

    // Gestione dell'invio del form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['name']);
        $genere = $_POST['gender'];
        $materie = $_POST['subjects'] ?? [];
        $insufficienze = count($materie);

        // Validazione
        if (empty($nome)) {
            $_SESSION['error_message'] = "<strong>Manca il nome dello studente</strong>";
            header("Location: error.php");
            exit;
        }

        // Controllo duplicati
        foreach ($_SESSION['students'] as $studente) {
            if ($studente['nome'] === $nome) {
                echo "<h2>Errore: lo studente è già stato inserito.</h2>";
                exit;
            }
        }

        // Calcolo esito
        $esito = calcolaEsito($insufficienze);

        // Salvataggio dello studente
        $_SESSION['students'][] = [
            'nome' => $nome,
            'genere' => $genere,
            'insufficienze' => $insufficienze,
            'esito' => $esito
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Esito Scrutinio </title>
</head>
<body>
    <div>
        <p>
            Lo Studente 
                <?php 
                    $ans = "";
                    if($esito){
                        $ans = "è estato ammesso/a";
                    } else {
                        $ans = "non è estato ammesso/a";
                    }
                
                    echo $nome . " " . $ans; 
                ?>
        </p>
    </div>

    <button onclick="window.location.href='../index.php'"> Inserire un nuovo studento </button>
    <button onclick="window.location.href='final.php'"> Termina Scrutinio </button>

</body>
</html>
