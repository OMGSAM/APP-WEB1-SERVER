<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'base_de_donnees');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_classe = $_POST['num_classe'];
    $motdepasse = $_POST['motdepasse'];

    $stmt = $conn->prepare("SELECT * FROM Classe WHERE num_classe = ? AND motdepasse = ?");
    $stmt->bind_param("is", $num_classe, $motdepasse);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['classe'] = $num_classe;
        header("Location: accueil.php");
    } else {
        echo "Numéro de classe ou mot de passe incorrect.";
    }
}
?>
<form method="POST" action="">
    Numéro de classe: <input type="text" name="num_classe" required>
    Mot de passe: <input type="password" name="motdepasse" required>
    <button type="submit">Se connecter</button>
</form>
