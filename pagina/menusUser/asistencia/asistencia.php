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
        <title>Asistencia</title>
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

            }

            td,
            th {

                text-align: left;
                padding: 8px;
            }


            .despues tr:nth-child(even) {
                background-color: #dddddd;
            }

            #ajustarTexto {
                width: 35%;
            }

            @media (max-width: 600px) {
                #ajustarTexto {
                    width: 100%;
                }
            }

            .form-group label {
                float: left;
                text-align: left;
            }

            .form-group select {
                display: inline-block;
                width: auto;
                vertical-align: middle;
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
                <h1>Estudiante de tu Asistencia</h1>
            </div>
        </div>

        <br>

        <div class="container-fluid">
            <form id="formCursos" name="formCursos" onsubmit="return cursosAsistencia()" method="post" action="#">
                <div class="input-group justify-content-center">
                    <select name="verCurso" id="verCurso" class="custom-select">
                        <?php
                        include_once "selecciones/cursosSelect.php";
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
                    if ($_POST['verCurso'] == "todas") {
                        $revisarSQL = "SELECT * FROM asistencias WHERE rut='".$rut."'";
                    } else {
                        $revisarSQL = "SELECT * FROM asistencias WHERE cursos='" . $_POST['verCurso'] . "' AND rut='".$rut."'";

                        echo "
                        <div class='text-center'>
                            <h4>Ver Curso es: " . $_POST['verCurso'] . "</h4>
                        </div>";
                    }
                } else {
                    $revisarSQL = "SELECT * FROM asistencias WHERE rut='".$rut."'";
                }
                ?>
            </form>

            <div class="animate__animated animate__backInLeft">
                <table>
                    <thead>
                        <tr style="background-color: #F71806;">
                            <th style="border: 1px solid black;">Nombre del estudiante</th>
                            <th style="border: 1px solid black;">Cursos</th>
                            <th style="border: 1px solid black;">Fecha</th>
                            <th style="border: 1px solid black;">Asistencias acumuladas del mes</th>
                            <th style="border: 1px solid black;">Total Clases</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultados = mysqli_query($conexion, $revisarSQL);
                        if (mysqli_num_rows($resultados) > 0) {
                            while ($row = mysqli_fetch_array($resultados)) {
                        ?>
                                <form id="formInscr" name="formInscr" method="post" action="subirSQL/subirAsist.php?verId=<?php echo $row['id'] . "&totalClases=" . $row['total']; ?>">
                                    <?php
                                    echo "<tr style='background-color: #F71806;' class='despues'>
                                    <th>" . $row['estudiante'] . "</th>
                                    <th>" . $row['cursos'] . "</th>
                                    <th>" . date("d-m-Y", strtotime($row['fecha'])) . "</th>";

                                    if ($row['asistencia'] == "Presente") {
                                        echo "<th class='text-center'>
                                    <label for='presentarSi' class='text-white'>
                                        Presente <i class='fas fa-school-circle-check'></i>
                                    </label>
                                    </th>";
                                    } else if ($row['asistencia'] == "Ausente") {
                                        echo "<th class='text-center'>
                                    <label for='presentarNo' class='text-white' >
                                        Ausente <i class='fas fa-school-circle-xmark'></i>
                                    </label>             
                                    </th>";
                                    }

                                    echo "
                                    <th class='text-center'>" . $row['total'] . "</th>
                                    <th>
                                    <button type='submit' id='guardarId' class='btn btn-success'>
                                        <i class='fas fa-floppy-disk'></i>
                                    </button>
                                    
                                     
                                    </th>
                                    </tr>";
                                    ?>
                                </form>
                        <?php
                            }
                        } else {
                            echo "<tr style='background-color: #F71806;'>
                            <th class='text-center' colspan='5'>
                            <i class='fas fa-folder-open'></i> No hay lista de estudiande
                            </th>
                            </tr>";
                        }
                        mysqli_free_result($resultados);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
        <script>
            if (!($('#borrarId') && $('#guardarId'))) {
                tippy('#borrarId', {
                    content: "Quiere borrar?",
                });

                tippy('#guardarId', {
                    content: "Guardar Asistencia",
                });
            }

            function creaAlumno() {
                var elegirEstd = document.forms["formAddAlumno"]["cadaEstudiante"].value;
                var sacarCurso = document.forms["formAddAlumno"]["sacarCurso1"].value;
                if (elegirEstd == "vacio") {
                    return false;
                }
                if (sacarCurso == "vacio") {
                    return false;
                }
                return true;
            }

            function cursosAsistencia() {
                var faltaSelect = document.forms["formCursos"]["verCurso"].value;
                if (faltaSelect == "vacio") {
                    return false;
                }
                return true;
            }
        </script>
    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>