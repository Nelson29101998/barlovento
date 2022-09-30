<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="disenoMejor/bootstrap/css/bootstrap.min.css">
    <script src="disenoMejor/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="disenoMejor/fontawesome/css/all.min.css">
    <script script="disenoMejor/fontawesome/js/all.min.js"></script>

    <link rel="stylesheet" href="disenoMejor/MDBootstrap/css/mdb.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Bienvenido a la portada de Centro Barlovento</title>
    <link rel="icon" type="image/png" href="image/icon_Barlovento.png" />
    <style>
        #disenoLetra {
            font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
        }

        body {
            background-color: #2689F9;
        }

        label {
            display: block;
            text-align: right;
        }

        #formColor {
            background-color: #F71806;
            border-radius: 20px;
        }

        .centerTabla {
            margin-left: auto;
            margin-right: auto;
        }

        .navbar-nav {
            flex-direction: row;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include_once "ajuste/cookie/cookie.php";
        include_once "espacioHTML/techo.html";
        ?>

        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container-fluid">
                <button onclick="location.href='pagina/acerca-de.php'" type="button" class="btn btn-primary navbar-btn">
                    <i class="fas fa-book"></i> Acerca de
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menus" aria-controls="menus" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="menus">
                <div class="p-2">
                    <button onclick="location.href='pagina/registrar/admst.php'" type="button" class="btn btn-primary navbar-btn">
                        <i class="fas fa-user-tie"></i> Administrador
                    </button>
                </div>
                <div class="p-2">
                    <button onclick="location.href='pagina/registrar/profesor.php'" type="button" class="btn btn-primary navbar-btn">
                        <i class="fas fa-chalkboard-user"></i> Profesor
                    </button>
                </div>
                <div class="p-2">
                    <button onclick="location.href='pagina/registrar/usuario.php'" type="button" class="btn btn-primary navbar-btn">
                        <i class="fas fa-user"></i> Estudiante
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <br>
    <div class="container">
        <div class="animate__animated animate__flipInX animate__delay-1s">
            <div class="text-center">
                <h1 id="disenoLetra" class="text-white">
                    Portada Administrativa
                </h1>
                <img src="image/logo_barlovento.png" class="img-fluid" alt="logo_CentroBarlovento">
            </div>
        </div>
    </div>
    <br>

    <?php
    include_once "espacioHTML/footers.html";
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
