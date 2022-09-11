<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../../../inicio.html");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    include_once "../../../conectarSQL/conectar_SQL.php";
    require_once "../../../ajuste/MobileDetect/Mobile_Detect.php";
    $detect = new Mobile_Detect;
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
        <title>Lista de Estudiantes</title>
        <link rel="icon" type="image/png" href="../../../image/icon_Barlovento.png" />
        <style>
            h1,
            h5,
            button {
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
            }

            td,
            th {

                text-align: left;
                padding: 8px;
            }

            #ajustarTexto {
                width: 35%;
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
                <h1>Lista de Estudiantes</h1>
            </div>
        </div>

        <form id="formCursos" name="formCursos" onsubmit="return cursosAsistencia()" method="post" action="">
            <div class="input-group justify-content-center">
                <select name="verCurso" id="verCurso" class="custom-select">
                    <?php
                    include_once "cursosSelect.php";
                    ?>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-magnifying-glass"></i> Buscar
                    </button>
                </div>
            </div>

            <br>
            <?php
            if (!empty($_POST['verCurso'])) {
                $urlCursos = $_POST['verCurso'];
                if ($_POST['verCurso'] == "todas") {
                    $revisarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias";
                } else {
                    $revisarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias WHERE cursos='" . $_POST['verCurso'] . "'";

                    echo "
                        <div class='text-center'>
                            <h4>Curso es: " . $_POST['verCurso'] . "</h4>
                        </div>";
                }
            } else {
                $revisarSQL = "SELECT DISTINCT rut, estudiante, telefono, mail FROM asistencias";
                $urlCursos = '';
            }
            ?>
        </form>

        <div class="animate__animated animate__backInLeft">
            <table style="background-color: #F71806;">
                <thead>
                    <tr>
                        <th>N*</th>
                        <th>Editar</th>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Mail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $resultados = mysqli_query($conexion, $revisarSQL);
                    $sum = 0;
                    if (mysqli_num_rows($resultados) > 0) {
                        while ($row = mysqli_fetch_array($resultados)) {
                            $sum = $sum + 1;
                            echo "<tr>
                            <th class='text-center'>" . $sum . "</th>
                        <th>
                        <a href='editarEstd.php?verRut=" . $row['rut'] . "'>
                            <button type='button' class='btn btn-primary'>
                                <i class='fas fa-pencil'></i>
                            </button>
                        </a>
                        </th>
                        <th>" . $row['rut'] . "</th>
                        <th>" . $row['estudiante'] . "</th>
                        <th>" . $row['telefono'] . "</th>
                        <th>" . $row['mail'] . "</th>
                        <th>
                        <a href='subirSQL/borrarEstd.php?borrarRut=" . $row['rut'] . "'>
                            <button type='button'";
                            if (!($detect->isMobile() && !$detect->isTablet())) {
                                echo "id='borrar'";
                            }
                            echo "class='btn btn-danger'>
                                <i class='fas fa-trash-can'></i>
                            </button>
                        </a>
                        </th>
                        </tr>";
                        }
                    }
                    mysqli_free_result($resultados);
                    ?>
                </tbody>
            </table>
        </div>

        <form id="formTitulo" name="formTitulo" onsubmit="return cursosTitulo()" method="post" target="_blank" action="<?php echo 'descargaDoc/descargarPdf.php?rut=' . $rut . '&verCurso=' . $urlCursos; ?>">

            <?php
            if ($detect->isMobile() && !$detect->isTablet()) {
                echo "<br>
            <div class='text-center'>
                <small>¡Cuidado si te borrar a la cuenta de estudiante: Asistencia, Estudiante, Incripcion y todas las partes. Que te puede perder!</small>
            </div>";
            }
            ?>

            <br>

            <div class="animate__animated animate__bounceIn animate__delay-1s">
                <table style="background-color: #F71806;">
                    <thead>
                        <tr>
                            <th>
                                Nombre de titulo de PDF:
                            </th>
                            <th>
                                <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ingresa su Titulo">
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <br>

            <?php
            include_once "avisar/toastsPDF.html";
            ?>

            <br>

            <div class="text-center animate__animated animate__bounceIn animate__delay-1s">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-file-pdf" style="font-size: 18px;"></i> Descargar un PDF
                </button>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            function cursosAsistencia() {
                return true;
            }

            function cursosTitulo() {
                var titulo = document.forms["formTitulo"]["titulo"].value;
                if (titulo == "" || titulo == null) {
                    $(document).ready(function() {
                        $('.errorTitulo').toast('show');
                    });
                    return false;
                }
                return true;
            }

            var element = document.getElementById('borrar');
            if (element != null && element.value == '') {
                tippy('#borrar', {
                    content: "¡Cuidado se va a borrar a la cuenta de estudiante: Asistencia, Estudiante, Incripcion y todas las partes. Que te puede perder!",
                    animation: 'scale',
                    interactive: true
                });
            }
        </script>

    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>