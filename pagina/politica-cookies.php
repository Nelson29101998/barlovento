<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../disenoMejor/bootstrap/css/bootstrap.min.css">
    <script src="../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../disenoMejor/fontawesome/css/all.min.css">
    <script script="../disenoMejor/fontawesome/js/all.min.js"></script>

    <link rel="stylesheet" href="../disenoMejor/MDBootstrap/css/mdb.min.css">
    <script rel="stylesheet" href="../disenoMejor/MDBootstrap/js/mdb.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Política de Cookies</title>
    <link rel="icon" type="image/png" href="../image/icon_Barlovento.png" />
    <style>
        #disenoLetra,
        label,
        p {
            font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
        }

        body {
            background-color: #2689F9;
        }

        #letraJusticia {
            text-align: justify;
        }

        .navbar-nav {
            flex-direction: row;
        }

        .carousel {
            width: 50%;
            height: 50%;
            margin: 0 auto;
        }

        @media (max-width: 600px) {
            .carousel {
                width: 100%;
                height: 100%;
                margin: 0 auto;
            }
        }

        .carousel-indicators {
            width: auto;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <div class="text-center">
            <h1 id="disenoLetra" class="text-white">
                Política de Cookies
            </h1>
        </div>
    </div>
    <br>
    <div class="text-center">
        <button onclick="volverPag()" type="button" class="btn btn-primary">
            <i class="fa-solid fa-house"></i> Inicio
        </button>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function volverPag(event) {
            if ('referrer' in document) {
                window.location = document.referrer;
                /* OR */
                //location.replace(document.referrer);
            } else {
                window.history.back();
            }
        }
    </script>
</body>

</html>
