<?php session_start(); 
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utente</title>
    <link rel="stylesheet" href="./css/logged_utente.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .triangle-container {
            position: relative;
            height: 300px; /* Altezza arbitraria per creare il triangolo */
        }

        .triangle-container .card {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .top-cards {
            margin-bottom: 50px; /* Aggiungere margine inferiore per separare i gruppi di card */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col text-right">
            <a href="#" class="btn btn-outline-primary">Icona Account</a>
        </div>
    </div>

    <div class="content">
        <div class="box">
            <a href="scheda_preparatore.php" class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Scheda Preparatore</h5>
                    <p class="card-text">Assegnate: <span id="schede_preparatore">0</span>/5</p>
                </div>
            </a>
        </div>
        <div class="box">
            <a href="crea_scheda.php" class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Crea la tua Scheda</h5>
                </div>
            </a>
        </div>
    </div>

    <div class="mie-schede">
        <div class="box">
            <a href="mie_schede.php" class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Le mie Schede</h5>
                    <p class="card-text">Salvate: <span id="mie_schede">0</span>/10</p>
                </div>
            </a>
        </div>
    </div>
</div>
