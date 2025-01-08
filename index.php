<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrutinio Classe</title>
</head>
<body>
    <h1>Inserimento Studenti</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="pages/formhandler.php">
        <label for="name">Nome:</label> 
        <input type="text" id="name" name="name">

        <label for="gender">Genere:</label>
        <select id="gender" name="gender">
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
        </select>

        <fieldset>
            <legend>Materie insufficienti:</legend>
            <label><input type="checkbox" name="subjects[]" value="ITA"> Italiano</label>
            <label><input type="checkbox" name="subjects[]" value="MAT"> Matematica</label>
            <label><input type="checkbox" name="subjects[]" value="INF"> Informatica</label>
            <label><input type="checkbox" name="subjects[]" value="ENG"> Inglese</label>
            <label><input type="checkbox" name="subjects[]" value="SIS"> Sistemi</label>
            <label><input type="checkbox" name="subjects[]" value="STO"> Storia</label>
            <label><input type="checkbox" name="subjects[]" value="TPS"> TPSIT</label>
            <label><input type="checkbox" name="subjects[]" value="GPO"> Gestione</label>
        </fieldset>

        <button type="submit">Esito Scrutinio</button>
    </form>

</body>
</html>