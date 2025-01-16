<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_module = $_POST['num_module'];
    $nom_module = $_POST['nom_module'];
    $masse_horaire = $_POST['masse_horaire'];
    $num_prof = $_POST['num_prof'];
    $num_classe = $_POST['num_classe'];

    if ($masse_horaire >= 10) {
        $stmt = $conn->prepare("INSERT INTO Module VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isiiii", $num_module, $nom_module, $masse_horaire, $num_prof, $num_prof, $num_classe);
        $stmt->execute();
        echo "Module ajouté avec succès.";
    } else {
        echo "La masse horaire doit être >= 10.";
    }
}
?>
<form method="POST" action="">
    Numéro du module: <input type="number" name="num_module" required>
    Nom du module: <input type="text" name="nom_module" required>
    Masse horaire: <input type="number" name="masse_horaire" required>
    Professeur: <select name="num_prof">...</select>
    Classe: <select name="num_classe">...</select>
    <button type="submit">Ajouter</button>
</form>
