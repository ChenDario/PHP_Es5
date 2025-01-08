<?php
    session_start();
    // Rimuovi tutte le variabili di sessione
    session_unset();
    // Distruggi la sessione
    session_destroy();
    
    header("Location: ../index.php");
?>