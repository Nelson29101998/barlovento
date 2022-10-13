<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../inicio.php");
} else {

    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../disenoMejor/bootstrap/css/bootstrap.min.css">
        <script src="../../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../../disenoMejor/fontawesome/css/all.min.css">
        <script script="../../../disenoMejor/fontawesome/js/all.min.js"></script>

        <link rel="stylesheet" href="../../../disenoMejor/MDBootstrap/css/mdb.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <title>Ficha de participante</title>
        <link rel="icon" type="image/png" href="../../../image/icon_Barlovento.png" />
        <style>
            h1,
            h5 {
                font-family: "Comic Sans", "Comic Sans MS", "Chalkboard", "ChalkboardSE-Regular", sans-serif;
            }

            body {
                background-color: #2689F9;
                color: white;
            }

            table {
                margin-left: auto;
                margin-right: auto;
                border-radius: 15px;
                background-color: #F71806;
            }

            td,
            th {
                text-align: left;
                padding: 8px;
            }

            #ajustarTexto {
                width: 37%;
            }

            @media (max-width: 600px) {
                #ajustarTexto {
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>
        <?php
        //*SideNav y Hora
        include_once "../navMenus/sideNav.php";
        ?>
        <br>

        <div class="container">
            <div class="text-center">
                <h1>Ficha de participante</h1>
            </div>
            <div class="animate__animated animate__backInLeft">
                <form id="formInscr" name="formInscr" onsubmit="return crearInscripcion()" method="post" action="subirSQL/subirInscr.php">
                    <?php
                    //*Tabla de Participante.
                    include_once "ordenarTabla/participante.php";
                    echo "<br>";
                    include_once "avisarToast/toastsPartic.html";

                    echo "<br>";

                    //*Tabla de la cuenta de estudiante.
                    include_once "ordenarTabla/userEstudiante.php";
                    echo "<br>";
                    include_once "avisarToast/toastsUserEstd.html";

                    echo "<br>";

                    //*Tabla de Persona de apoyo.
                    include_once "ordenarTabla/apoyo.php";
                    echo "<br>";
                    include_once "avisarToast/toastsApoyo.html";

                    echo "<br>";

                    //*Tabla de Persona de medico.
                    include_once "ordenarTabla/medicos.php";
                    echo "<br>";
                    include_once "avisarToast/toastsMedico.html";

                    echo "<br>";

                    //*Tabla de Persona de informacion de salud.
                    include_once "ordenarTabla/informacionSalud.php";
                    echo "<br>";
                    include_once "avisarToast/toastsSalud.html";

                    echo "<br>";

                    //*Tabla de Persona de emergencia de contacto.
                    include_once "ordenarTabla/contacto.php";
                    echo "<br>";
                    include_once "avisarToast/toastsContacto.html";
                    ?>

                    <br>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>

                        <button type="reset" class="btn btn-success">
                            <i class="fas fa-recycle"></i> Limpiar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script src="../js/fichaPartcJS.js">

        </script>
    </body>

    </html>

<?php
}
?>