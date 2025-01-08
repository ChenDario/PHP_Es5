<?php 
session_start();
$students_data = $_SESSION['students'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Scrutinio Finale </title>
</head>
<body>
    
<?php

    // Itera correttamente sull'array degli studenti
    foreach ($students_data as $student) {
        $ans = "";
        if($student['esito']){
            $ans = "ammesso/a";
        } else {
            $ans = "non ammesso/a";
        }
        // Accedi correttamente ai dati degli studenti
        echo htmlspecialchars($student['nome']) . ": " . $ans . "<br>";
    }

?>

<button onclick="window.location.href='reset.php'"> Cancella Tutti i Dati </button>

</body>
</html>