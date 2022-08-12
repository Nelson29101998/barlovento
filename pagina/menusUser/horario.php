<?php

?>

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Horario</title>
    <link rel="icon" type="image/png" href="../image/icon_Barlovento.png" />
</head>

<body>
    <br>
    <div class="text-center">
        <h1>
            Horario
        </h1>
    </div>
    <div class="container">
        <div class="animate__animated animate__flipInX animate__delay-1s">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">
                            <h4>
                                <span class="badge badge-primary" id="verReloj"></span>
                            </h4>
                        </th>
                        <th class="text-center">
                            <button type="button" class="btn btn-primary" onclick="actualizarHorario()">
                                <i class="fa-solid fa-clock-rotate-left"></i> Acualizar a la hora.
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center" style="vertical-align:middle;">
                            <h6>
                                Hora ahora: <span class="badge" style="background-color: #54F667">&nbsp;</span>
                            </h6>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    

    <br>
    <?php
    include_once "../espacioHTML/footers.html";
    ?>

    <script src="../moment/moment.min.js"></script>
    <script src="../moment/locales.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var tiempoDato = null,
            datos = null;

        var actualizar = function() {
            datos = moment(new Date());
            tiempoDato.html(datos.format('HH:mm:ss a'));
        };

        var actualizarHorario = function() {
            $("#verTabla").load("../espacioHTML/semestres/segundoNew.html");
        };

        $(document).ready(function() {
            tiempoDato = $('#verReloj');
            actualizar();
            setInterval(actualizar, 1000);
        });

    </script>
</body>

</html>