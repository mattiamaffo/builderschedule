<?php session_start(); 
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap-5.3.0-alpha2/dist/css/bootstrap.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


   <link rel="stylesheet" href="./css/home.css">
</head>
<!-- Body page -->
<body>
    <div class="container">
        <h1 class="dancing-script-h1">Benvenuto!</h1>
        <form id="login-form" method="post" action="..\Back_end\login.php">
            <div class="form-group">
                <!-- <label for="cf">Codice Fiscale:</label> -->
                <input type="text" id="cf" placeholder="Codice Fiscale" name="cf-login" required>
            </div>
            <div class="form-group">
            <div class="password-container">
                <!-- <label for="password">Password:</label>-->
                <input type="password" id="password" placeholder="Password" name="password-login" required>
                <i class="fas fa-eye-slash" id="togglePassword-"></i>

            </div>
            </div>
            <div class="form-group">
                <button class="Oswald-but" type="submit">Accedi</button>
            </div>
            <div class="switch">
               
                <a class="Oswald-reg" href="#" id="register-link">Registrati</a>
                
            </div>

            <div class="switch">
                <a class="Oswald-rec" href="#" id="recover-link">Recupera password</a>
            </div>
        </form>
        
        <form id="register-form" style="display: none;" method="post" action="..\Back_end\registrazione.php">
            <div class="form-group">
                <label for="cf-register">Codice Fiscale:</label>
                <input type="text" id="cf-register" name="cf-register" onchange="validateCF();" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" onchange="validateEmail();" required>
            </div>
            <div class="form-group">
                <div class="password-container">
                    <label for="password-register">Password:</label>
                    <input type="password" id="password-register" name="password-register" onchange="validatePassword();" required>
                    <i class="fas fa-eye-slash" id="togglePassword"></i>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="Oswald-but">Registrati</button>
            </div>
            <div class="switch">
                <a class="Oswald-reg" href="#" id="login-link">Torna all'accesso</a>
            </div>
            <div class="switch">
                <a class="Oswald-rec" href="#" id="recover-link">Recupera password</a>
            </div>


            
            
        </form>

    <form id="recover-form" style="display: none;" method="post" action="..\Back_end\recupero_password.php">
            <div class="form-group">
                <label for="email-recover">Inserisci l'email associata al tuo account:</label>
                <input type="text" id="email-recover" name="email-recover" required>
            </div>
            <div class="form-group" style="text-align: center;">
                <button type="submit" class="Oswald-but">Modifica Password</button>
            </div>
    </form>


        <script src="./js/home.js"></script>
    </div>
</body>

</html>