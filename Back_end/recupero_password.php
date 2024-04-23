<?php
// Connessione al database SQLite3
$db = new SQLite3('C:\xampp\htdocs\Progetto_palestra\builderschedule\DB_palestra\Gym_Db.db');

// Verifica se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cf-recover'])) {
    $cf = $_POST['cf-recover'];

    // Esempio di query per verificare se il CF è presente nel database
    $query = $db->prepare("SELECT CF FROM Utente_registrato WHERE CF = :cf");
    $query->bindValue(':cf', $cf, SQLITE3_TEXT);
    $result = $query->execute();

    if ($result->fetchArray(SQLITE3_ASSOC)) {
        // CF trovato nel database, restituisci una risposta JSON di successo
        echo json_encode(["success" => true]);
    } else {
        // CF non trovato nel database, restituisci una risposta JSON di errore
        echo json_encode(["success" => false]);
    }

    // Chiudi la connessione al database
    $db->close();
}

// Se è stata inviata una richiesta POST per aggiornare la password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new-password'])) {
    // Esegui il codice per aggiornare la password nel database
    $cf = $_POST['cf-recover'];
    $new_pw = $_POST['new-password'];
    $query = $db->prepare("UPDATE Utente_registrato SET Password = :newPassword WHERE CF = :cf");
    $query->bindValue(':newPassword', $newPassword, SQLITE3_TEXT);
    $query->bindValue(':cf', $cf, SQLITE3_TEXT);
    
    // Esegui la query per aggiornare la password nel database
    $result = $query->execute();

    // Verifica se l'aggiornamento è avvenuto con successo
    if ($result) {
        // Password aggiornata con successo, restituisci una risposta JSON di successo
        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo '    Swal.fire({
                            title: "Hai modificato la password con successo",
                            text: "Ora puoi accedere alle tue schede.",
                            icon: "success",
                            timer: 1500, // Tempo in millisecondi (2 secondi)
                            showConfirmButton: false
                            }).then(() => {
                            window.location.href = "../Front_end/home.php";
                            });';
                echo '});';
                echo '</script>';
        echo json_encode(["success" => true]);
        exit;
    } else {
        // Errore durante l'aggiornamento della password, restituisci una risposta JSON di errore
        echo json_encode(["success" => false]);
    }
}

?>

