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

        <form id="formCursos" name="formCursos" onsubmit="return cursosAsistencia()" method="post" action="#">
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

        <table style="background-color: #F71806;">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultados = mysqli_query($conexion, $revisarSQL);
                if (mysqli_num_rows($resultados) > 0) {
                    while ($row = mysqli_fetch_array($resultados)) {
                        echo "<tr>
                        <th>" . $row['rut'] . "</th>
                        <th>" . $row['estudiante'] . "</th>
                        <th>" . $row['telefono'] . "</th>
                        <th>" . $row['mail'] . "</th>
                        </tr>";
                    }
                }
                mysqli_free_result($resultados);
                ?>
            </tbody>
        </table>

        <br>

        <div class="text-center">
            <?php
            echo "<a href='descargaDoc/descargarPdf.php?rut=".$rut."&verCurso=".$urlCursos."' target='_blank'>           
                    <button type='button' class='btn btn-danger'>
                        <i class='fas fa-file-pdf' style='font-size: 18px;'></i> Descargar un PDF
                    </button> 
                </a>";          
            ?>
        </div>
    </body>

    </html>
<?php
    mysqli_close($conexion);
}
?>