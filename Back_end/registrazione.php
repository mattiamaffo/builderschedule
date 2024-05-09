
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connessione al database SQLite3
    try {
        $db = new SQLite3('..\DB_palestra\Gym_Db.db');
    } catch (Exception $e) {
        die("Impossibile connettersi al database: " . $e->getMessage());
    }

    // Verifica se sono stati inviati dati dal modulo
    if(isset($_POST['cf-register'], $_POST['email'], $_POST['password-register'])) {
        // Prendi i dati dalla form
        $CF = $_POST['cf-register'];
        $Email = $_POST['email'];
        $Password = $_POST['password-register'];

        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

        // Esempio di query di inserimento di dati con parametri
        $query = $db->prepare("INSERT INTO Utente_registrato (CF, Email, Password) VALUES (:CF, :Email, :Password)");
        $query->bindValue(':CF', $CF, SQLITE3_TEXT);
        $query->bindValue(':Email', $Email, SQLITE3_TEXT);
        $query->bindValue(':Password', $hashedPassword, SQLITE3_TEXT);
        
        // Esegui la query
        $result = $query->execute();
        
        // Controlla se l'inserimento è avvenuto con successo
        if ($result) {
            // Reindirizza l'utente a home.html
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo '    Swal.fire({
                          title: "Registrazione avvenuta!",
                          text: "Dati inseriti con successo.",
                          icon: "success",
                          timer: 1500, // Tempo in millisecondi (2 secondi)
                          showConfirmButton: false
                        }).then(() => {
                          window.location.href = "../Front_end/home.php";
                        });';
            echo '});';
            echo '</script>';
            exit; // Assicura che lo script PHP si interrompa qui
        } else {
            echo "Errore durante l'inserimento dei dati nel database.";
        }
        
        // Chiudi la connessione al database
        $db->close();
    } else {
        echo "Compila tutti i campi del modulo.";
    }
}
?>
