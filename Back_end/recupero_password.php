<?php
// Connessione al database SQLite3
$db = new SQLite3('..\DB_palestra\Gym_Db.db');

// Verifica se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email-recover'])) {
    $email = $_POST['email-recover'];

    // Esempio di query per verificare se il CF è presente nel database
    $query = $db->prepare("SELECT CF FROM Utente_registrato WHERE Email = :email");
    $query->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $query->execute();

    if ($result->fetchArray(SQLITE3_ASSOC)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo '    Swal.fire({
                            title: "trovato stupido",
                            text: "Ora puoi diduuuu.",
                            icon: "success",
                            timer: 1500, // Tempo in millisecondi (2 secondi)
                            showConfirmButton: false
                            }).then(() => {
                            window.location.href = "../Front_end/home.php";
                            });';
                echo '});';
                echo '</script>';
                exit;
    } else {
        // CF non trovato nel database, restituisci una risposta JSON di errore
        echo json_encode(["success" => false]);
    }

    // Chiudi la connessione al database
    $db->close();
}

// Se è stata inviata una richiesta POST per aggiornare la password



?>

