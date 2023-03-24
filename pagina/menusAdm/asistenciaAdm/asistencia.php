<?php
include_once "../../../ajuste/config.php";
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../inicio.php");
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
        <?php
        //! Favicon
        $direccion = "../../../";
        include_once $direccion . "ajuste/favicon.php";
        ?>
        <link rel="stylesheet" href="css/diseno.css?v=<? echo $version; ?>">
    </head>

    <body>
        <?php
        //*SideNav y Hora
        include_once "../navMenus/sideNav.php";
        ?>
        <br>
        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1>Asistencia</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid animate__animated animate__bounceIn animate__delay-1s">
            <form id="formAddAlumno" name="formAddAlumno" onsubmit="return creaAlumno()" method="post" action="subirSQL/anadirEstd.php">
                <table style="background-color: #F71806; border-radius: 15px;">
                    <tbody>
                        <tr>
                            <th>
                                <label for="cadaEstudiante" class="text-white">
                                    <i class="fas fa-user"></i> Elige un Participante:
                                </label>
                                <select name="cadaEstudiante" id="cadaEstudiante" class="form-select">
                                    <?php
                                    include_once "selecciones/estdSelect.php";
                                    ?>
                                </select>
                            </th>
                            <th>
                                <label for="sacarCurso1" class="text-white">
                                    <i class="fas fa-user"></i> Elige talleres:
                                </label>
                                <div class="form-group">
                                    <label for="sacarCurso1" class="col-auto">1-
                                        <select name="sacarCurso1" id="sacarCurso1" class="form-select">
                                            <?php
                                            include_once "selecciones/sacarCursosSelect.php";
                                            ?>
                                        </select>
                                    </label>
                                    <br>
                                    <label for="sacarCurso2" class="col-auto">2-
                                        <select name="sacarCurso2" id="sacarCurso2" class="form-select">
                                            <?php
                                            include_once "selecciones/sacarCursosSelect2.php";
                                            ?>
                                        </select>
                                        (Opcional)
                                    </label>
                                    <br>
                                    <label for="sacarCurso3" class="col-auto">3-
                                        <select name="sacarCurso3" id="sacarCurso3" class="form-select">
                                            <?php
                                            include_once "selecciones/sacarCursosSelect3.php";
                                            ?>
                                        </select>
                                        (Opcional)
                                    </label>
                                    <br>
                                    <label for="sacarCurso4" class="col-auto">4-
                                        <select name="sacarCurso4" id="sacarCurso3" class="form-select">
                                            <?php
                                            include_once "selecciones/sacarCursosSelect4.php";
                                            ?>
                                        </select>
                                        (Opcional)
                                    </label>
                                    <br>
                                    <label for="sacarCurso5" class="col-auto">5-
                                        <select name="sacarCurso5" id="sacarCurso5" class="form-select">
                                            <?php
                                            include_once "selecciones/sacarCursosSelect5.php";
                                            ?>
                                        </select>
                                        (Opcional)
                                    </label>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-user-plus"></i> Añadir Participante
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
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
                        $revisarSQL = "SELECT * FROM asistencias";
                    } else {
                        $revisarSQL = "SELECT * FROM asistencias WHERE cursos='" . $_POST['verCurso'] . "'";

                        echo "
                        <div class='text-center'>
                            <h4>Ver Curso es: " . $_POST['verCurso'] . "</h4>
                        </div>";
                    }
                } else {
                    $revisarSQL = "SELECT * FROM asistencias";
                }
                ?>
            </form>

            <div class="animate__animated animate__backInLeft">
                <table>
                    <thead>
                        <tr style="background-color: #F71806;">
                            <th style="border: 1px solid black;">N*</th>
                            <th style="border: 1px solid black;">Editar</th>
                            <th style="border: 1px solid black;">Nombre del Participante</th>
                            <th style="border: 1px solid black;">Talleres</th>
                            <th style="border: 1px solid black;">Fecha</th>
                            <th style="border: 1px solid black;">Asistencias acumuladas del mes</th>
                            <th style="border: 1px solid black;">Total Clases</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultados = mysqli_query($conexion, $revisarSQL);
                        $sumTotal = 0;
                        if (mysqli_num_rows($resultados) > 0) {
                            while ($row = mysqli_fetch_array($resultados)) {
                                $sumTotal = $sumTotal + 1;
                        ?>
                                <form id="formInscr" name="formInscr" method="post" action="subirSQL/subirAsist.php?verId=<?php echo $row['id'] . "&totalClases=" . $row['total']; ?>">
                                    <?php
                                    echo "<tr style='background-color: #F71806;' class='despues'>
                                    <th>" . $sumTotal . "</th>
                                    <th>
                                    <a href='editarAsist.php?verId=" . $row['id'] . "'>
                                    <button type='button' class='btn btn-primary'>
                                    <i class='fas fa-user-pen'></i>
                                    </button>
                                    </a>
                                    </th>
                                    <th>" . $row['estudiante'] . "</th>
                                    <th>" . $row['cursos'] . "</th>
                                    <th>" . date("d-m-Y", strtotime($row['fecha'])) . "</th>";

                                    if ($row['asistencia'] == "Presente") {
                                        echo "<th>
                                    <div style='float: left;'>                              
                                    <input type='radio' id='presentarNo' name='presentar' value='Ausente'>
                                    <label for='presentarNo' class='text-white'>
                                        Ausente <i class='fas fa-school-circle-xmark'></i>
                                    </label>
                                    </div>
                                    <div style='float: right;'>
                                    <input type='radio' id='presentarSi' name='presentar' value='Presente' checked>                
                                    <label for='presentarSi' class='text-white'>
                                        Presente <i class='fas fa-school-circle-check'></i>
                                    </label> 
                                    </div>  
                                    </th>";
                                    } else if ($row['asistencia'] == "Ausente") {
                                        echo "<th>
                                    <div style='float: left;'>
                                    <input type='radio' id='presentarNo' name='presentar' value='Ausente' checked>
                                    <label for='presentarNo' class='text-white' >
                                        Ausente <i class='fas fa-school-circle-xmark'></i>
                                    </label>
                                    </div>
                                    <div style='float: right;'>
                                    <input type='radio' id='presentarSi' name='presentar' value='Presente'>                
                                    <label for='presentarSi' class='text-white'>
                                        Presente <i class='fas fa-school-circle-check'></i>
                                    </label>
                                    </div>              
                                    </th>";
                                    }

                                    echo "
                                    <th class='text-center'>" . $row['total'] . "</th>
                                    <th>
                                    <button type='submit' id='guardarId' class='btn btn-success'>
                                        <i class='fas fa-floppy-disk'></i>
                                    </button>
                                    <a href='subirSQL/borrarAsist.php?borrarId=" . $row['id'] . "'>                                   
                                    <button type='button' id='borrarId' class='btn btn-danger'>
                                        <i class='fas fa-trash-can'></i>
                                    </button>
                                    </a> 
                                    </th>
                                    </tr>";
                                    ?>
                                </form>
                        <?php
                            }
                        } else {
                            echo "<tr style='background-color: #F71806;'>
                            <th class='text-center' colspan='7'>
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