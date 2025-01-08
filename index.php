<!DOCTYPE html>
<html lang="it" data-bs-theme="dark">
<head>
    <!--Link CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!--Script JS -->
    <script src="js/script.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrutinio Classe</title>
</head>
<body>
    <div class="title">
        <h1>Inserimento Studenti</h1>
    </div>

    <div class="btn-theme">
        <button id="theme-toggle">Switch Theme</button> <!-- Pulsante per attivare il tema scuro -->
    </div>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="pages/formhandler.php" class="form">
        
        <label for="name">Nome:</label> 
        <input type="text" id="name" name="name">

        <label for="gender">Genere:</label>
        <select id="gender" name="gender">
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
        </select>

        <fieldset>
            <legend>Materie insufficienti:</legend>
            <label><input type="checkbox" name="subjects[]" value="Italiano"> Italiano</label>
            <label><input type="checkbox" name="subjects[]" value="Matematica"> Matematica</label>
            <label><input type="checkbox" name="subjects[]" value="Informatica"> Informatica</label>
            <label><input type="checkbox" name="subjects[]" value="Inglese"> Inglese</label>
            <label><input type="checkbox" name="subjects[]" value="Sistemi"> Sistemi</label>
            <label><input type="checkbox" name="subjects[]" value="Storia"> Storia</label>
            <label><input type="checkbox" name="subjects[]" value="TPSIT"> TPSIT</label>
            <label><input type="checkbox" name="subjects[]" value="Gestione"> Gestione</label>
        </fieldset>

        <div class = "btn">
            <button type="submit">Esito Scrutinio</button>
        </div>
    </form>

</body>
</html>