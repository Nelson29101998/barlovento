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
        <script>
            nacePartc.max = new Date().toISOString().split("T")[0];

            var notaRut = "Por ejemplo de Rut: 2xx32xxxk No punto ni guion.";

            tippy('#rutPartc', {
                content: notaRut,
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            tippy('#rutApoyo', {
                content: notaRut,
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            var notaTel = "Por ejemplo de teléfono: +569XXXXXXXX No ponga espacio.";

            tippy('#telefonoPartc', {
                content: notaTel,
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            tippy('#telefonoApoyo', {
                content: notaTel,
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            tippy('#telefonoApoyoOtro', {
                content: notaTel,
                animation: 'scale',
                trigger: 'click',
                interactive: true
            });

            function crearInscripcion() {
                var aprobar = false;
                if (tablaParticipante() && tablaUserEstudiante() && tablaApoyo() &&
                    tablaMedico() && tablaSalud() && tablaContacto()) {
                    console.log("Verdar");
                    aprobar = true;
                } else {
                    tablaParticipante();
                    tablaUserEstudiante();
                    tablaApoyo();
                    tablaMedico();
                    tablaSalud();
                    tablaContacto();
                    console.log("Falso");
                    aprobar = false;
                }
                return aprobar;
            }

            function tablaParticipante() {
                var nombreParticipante = document.forms["formInscr"]["nombreParticipante"].value;
                var edadPartc = document.forms["formInscr"]["edadPartc"].value;
                var NacePartc = document.forms["formInscr"]["nacePartc"].value;
                var rutPartc = document.forms["formInscr"]["rutPartc"].value;
                var telPartc = document.forms["formInscr"]["telefonoPartc"].value;
                var mailPartc = document.forms["formInscr"]["correoPartc"].value;
                var dirPartc = document.forms["formInscr"]["direccionPartc"].value;
                var vivePartc = document.forms["formInscr"]["vivePartc"].value;

                if (nombreParticipante == "" || nombreParticipante == null) {
                    $(document).ready(function() {
                        $('.errorNomPartc').toast('show');
                    });
                    return false;
                }

                if (edadPartc == "" || edadPartc == null) {
                    $(document).ready(function() {
                        $('.errorEdadPartc').toast('show');
                    });
                    return false;
                }

                if (NacePartc == "" || NacePartc == null) {
                    $(document).ready(function() {
                        $('.errorNacePartc').toast('show');
                    });
                    return false;
                }

                if (rutPartc == "" || rutPartc == null) {
                    $(document).ready(function() {
                        $('.errorRutPartc').toast('show');
                    });
                    return false;
                }

                if (telPartc == "" || telPartc == null) {
                    $(document).ready(function() {
                        $('.errorTelPartc').toast('show');
                    });
                    return false;
                }


                if (mailPartc == "" || mailPartc == null) {
                    $(document).ready(function() {
                        $('.errorMailPartc').toast('show');
                    });
                    return false;
                }

                if (dirPartc == "" || dirPartc == null) {
                    $(document).ready(function() {
                        $('.errorDirPartc').toast('show');
                    });
                    return false;
                }

                if (vivePartc == "" || vivePartc == null) {
                    $(document).ready(function() {
                        $('.errorVivePartc').toast('show');
                    });
                    return false;
                }

                return true;
            }

            function tablaUserEstudiante() {
                var userEstudiante = document.forms["formInscr"]["userEstudiante"].value;
                var passEstudiante = document.forms["formInscr"]["passEstudiante"].value;

                if (userEstudiante == "" || userEstudiante == null) {
                    $(document).ready(function() {
                        $('.errorUserEstudiante').toast('show');
                    });
                    return false;
                }

                if (passEstudiante == "" || passEstudiante == null) {
                    $(document).ready(function() {
                        $('.errorPassEstudiante').toast('show');
                    });
                    return false;
                }

                return true;
            }

            function tablaApoyo() {
                var nombreApoyo = document.forms["formInscr"]["nombreApoyo"].value;
                var parentesco = document.forms["formInscr"]["parentesco"].value;
                var rutApoyo = document.forms["formInscr"]["rutApoyo"].value;
                var telefonoApoyo = document.forms["formInscr"]["telefonoApoyo"].value;
                var otroTelefono = document.forms["formInscr"]["telefonoApoyoOtro"].value;
                var mailApoyo = document.forms["formInscr"]["correoApoyo"].value;
                var dirApoyo = document.forms["formInscr"]["direccionApoyo"].value;

                if (nombreApoyo == "" || nombreApoyo == null) {
                    $(document).ready(function() {
                        $('.errorNomApoyo').toast('show');
                    });
                    return false;
                }

                if (parentesco == "" || parentesco == null) {
                    $(document).ready(function() {
                        $('.errorParentesco').toast('show');
                    });
                    return false;
                }

                if (rutApoyo == "" || rutApoyo == null) {
                    $(document).ready(function() {
                        $('.errorRutApoyo').toast('show');
                    });
                    return false;
                }

                if (telefonoApoyo == "" || telefonoApoyo == null) {
                    $(document).ready(function() {
                        $('.errorTelApoyo').toast('show');
                    });
                    return false;
                }

                if (otroTelefono == "" || otroTelefono == null) {
                    $(document).ready(function() {
                        $('.errorOtroTelApoyo').toast('show');
                    });
                    return false;
                }

                if (mailApoyo == "" || mailApoyo == null) {
                    $(document).ready(function() {
                        $('.errorMailApoyo').toast('show');
                    });
                    return false;
                }

                if (dirApoyo == "" || dirApoyo == null) {
                    $(document).ready(function() {
                        $('.errorDirApoyo').toast('show');
                    });
                    return false;
                }

                return true;
            }

            function tablaMedico() {
                var diagnostico = document.forms["formInscr"]["diagn"].value;
                var medico = document.forms["formInscr"]["medico"].value;
                var medicaHora = document.forms["formInscr"]["medicaHora"].value;
                var otroMedico = document.forms["formInscr"]["otroMedico"].value;

                if (diagnostico == "" || diagnostico == null) {
                    $(document).ready(function() {
                        $('.errorDiagnostico').toast('show');
                    });
                    return false;
                }

                if (medico == "" || medico == null) {
                    $(document).ready(function() {
                        $('.errorMedico').toast('show');
                    });
                    return false;
                }

                if (medicaHora == "" || medicaHora == null) {
                    $(document).ready(function() {
                        $('.errorMedicaHora').toast('show');
                    });
                    return false;
                }

                if (otroMedico == "" || otroMedico == null) {
                    $(document).ready(function() {
                        $('.errorOtroMedico').toast('show');
                    });
                    return false;
                }

                return true;
            }

            function tablaSalud() {
                var preSalud = document.forms["formInscr"]["preSalud"].value;
                var alergia = document.forms["formInscr"]["alergia"].value;
                var hospital = document.forms["formInscr"]["hospital"].value;
                var segurosSalud = document.forms["formInscr"]["segurosSalud"].value;

                if (preSalud == "" || preSalud == null) {
                    $(document).ready(function() {
                        $('.errorPreSalud').toast('show');
                    });
                    return false;
                }

                if (alergia == "" || alergia == null) {
                    $(document).ready(function() {
                        $('.errorAlergia').toast('show');
                    });
                    return false;
                }

                if (hospital == "" || hospital == null) {
                    $(document).ready(function() {
                        $('.errorHospital').toast('show');
                    });
                    return false;
                }

                if (segurosSalud == "" || segurosSalud == null) {
                    $(document).ready(function() {
                        $('.errorSeguroSalud').toast('show');
                    });
                    return false;
                }

                return true;
            }

            function tablaContacto() {
                var contUnoNom = document.forms["formInscr"]["contUnoNom"].value;
                var contDosNom = document.forms["formInscr"]["contDosNom"].value;
                var contUnoParent = document.forms["formInscr"]["contUnoParent"].value;
                var contDosParent = document.forms["formInscr"]["contDosParent"].value;
                var contUnoPhone = document.forms["formInscr"]["contUnoPhone"].value;
                var contDosPhone = document.forms["formInscr"]["contDosPhone"].value;

                if (contUnoNom == "" || contUnoNom == null) {
                    $(document).ready(function() {
                        $('.errorContUnoNom').toast('show');
                    });
                    return false;
                }

                if (contDosNom == "" || contDosNom == null) {
                    $(document).ready(function() {
                        $('.errorContDosNom').toast('show');
                    });
                    return false;
                }

                if (contUnoParent == "" || contUnoParent == null) {
                    $(document).ready(function() {
                        $('.errorContUnoParent').toast('show');
                    });
                    return false;
                }

                if (contDosParent == "" || contDosParent == null) {
                    $(document).ready(function() {
                        $('.errorContDosParent').toast('show');
                    });
                    return false;
                }

                if (contUnoPhone == "" || contUnoPhone == null) {
                    $(document).ready(function() {
                        $('.errorContUnoPhone').toast('show');
                    });
                    return false;
                }

                if (contDosPhone == "" || contDosPhone == null) {
                    $(document).ready(function() {
                        $('.errorContDosPhone').toast('show');
                    });
                    return false;
                }

                return true;
            }
        </script>
    </body>

    </html>

<?php
}
?>