<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connessione al database SQLite3
    try {
        $db = new SQLite3('C:\xampp\htdocs\Progetto_palestra\builderschedule\DB_palestra\Gym_Db.db');
    } catch (Exception $e) {
        die("Impossibile connettersi al database: " . $e->getMessage());
    }

    // Verifica se sono stati inviati dati dal modulo
    if(isset($_POST['cf-login'], $_POST['password-login'])) {
        // Prendi i dati dalla form
        $CF = $_POST['cf-login'];
        $Password = $_POST['password-login'];

        // Esempio di query per verificare le credenziali
        $query = $db->prepare("SELECT CF, Password FROM Utente_registrato WHERE CF = :CF");
        $query->bindValue(':CF', $CF, SQLITE3_TEXT);
        
        // Esegui la query
        $result = $query->execute();

        // Controlla se il CF è presente nel database
        if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            // Verifica se la password hashata corrisponde
            if (password_verify($Password, $row['Password'])) {
                // Password corretta, l'utente è autenticato con successo
                // Reindirizza l'utente alla pagina di home o alla pagina desiderata
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo '    Swal.fire({
                            title: "Hai effettuato l\'accesso",
                            text: "Ora puoi accedere alle tue schede.",
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
                echo "La password non è corretta.";
            }
        } else {
            echo "Codice fiscale non trovato nel database.";
        }
        
        // Chiudi la connessione al database
        $db->close();
    } else {
        echo "Compila tutti i campi del modulo.";
    }
}
?>
