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
        <title>Editar</title>
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
            }

            td,
            th {

                text-align: left;
                padding: 8px;
            }

            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */

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
                <h1>Curso</h1>
            </div>
        </div>

        <div class="animate__animated animate__bounceIn animate__delay-1s">
            <form id="formCurso" name="formCurso" onsubmit="return crearCurso()" method="post" action="subirSql/sqlCurso.php?cualquier=anadir">
                <table style="background-color: #F71806;">
                    <tbody>
                        <tr class="form-group">
                            <th>
                                <label for="nomCurso" class="text-white">
                                    <i class="fas fa-chalkboard-user"></i> Ingresa su nombre de Curso:
                                </label>
                                <input type="text" class="form-control" name="nomCurso" id="nomCurso" maxlength="50" placeholder="Ingresa su nombre de Curso">
                            </th>

                        </tr>
                        <tr class="form-group">
                            <th class="text-center">
                                <button type="submit" id="anadirCurso" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

        <br>
        
        <div class="animate__animated animate__bounceIn animate__delay-1s">
            <table style="background-color: #F71806;">
                <thead>
                    <tr>
                        <th>
                            N*
                        </th>
                        <th>
                            Nombre de Curso
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $revisarCurso = "SELECT * FROM cursos";
                    $sum = 0;
                    $resultadosCurso = mysqli_query($conexion, $revisarCurso);
                    if (mysqli_num_rows($resultadosCurso) > 0) {
                        while ($row = mysqli_fetch_array($resultadosCurso)) {
                            $sum = $sum + 1;
                            echo "<tr>
                        <th>" . $sum . "</th>
                        <th>" . $row['nombreCurso'] . "</th>
                        <th>
                        <a href='subirSQL/sqlCurso.php?borrarId=" . $row['id'] . "&cualquier=borrar'>                                   
                            <button type='button' id='borrarId' class='btn btn-danger'>
                                <i class='fas fa-trash-can'></i>
                            </button>
                        </a> 
                        </th>
                        </tr>";
                        }
                    } else {
                        echo "<tr>
                    <th class='text-center' colspan='2'>
                    <i class='fas fa-folder-open'></i> No hay curso
                    </th>
                    </tr>";
                    }
                    mysqli_free_result($resultadosCurso);
                    ?>
                </tbody>
            </table>
        </div>

        <br>

        <div class="container">
            <div class="text-center">
                <h1>Profesor</h1>
            </div>
        </div>

        <div class="animate__animated animate__backInLeft">
            <form id="formPro" name="formPro" onsubmit="return crearProfesor()" method="post" action="subirSql/sqlProfesor.php?ajuste=anadir">
                <table style="background-color: #F71806;">
                    <tbody>
                        <tr class="form-group">
                            <th>
                                <label for="rutPro" class="text-white">
                                    <i class="fas fa-address-card"></i> Rut:
                                </label>
                                <input type="text" class="form-control" name="rutPro" id="rutPro" maxlength="9" placeholder="Ingresa su rut">
                            </th>
                            <th>
                                <label for="nomPro" class="text-white">
                                    <i class="fas fa-user-tie"></i> Nombre de Profesor:
                                </label>
                                <input type="text" class="form-control" name="nomPro" id="nomPro" maxlength="50" placeholder="Ingresa su nombre de profesor">
                            </th>
                        </tr>
                        <tr class="form-group">
                            <th>
                                <label for="userPro" class="text-white">
                                    <i class="fas fa-address-card"></i> Usuario de Profesor:
                                </label>
                                <input type="text" class="form-control" name="userPro" id="userPro" maxlength="50" placeholder="Ingresa su usuario">
                            </th>
                            <th>
                                <label for="contrPro" class="text-white">
                                    <i class="fas fa-key"></i> Contraseña de Profesor:
                                </label>
                                <input type="password" class="form-control" name="contrPro" id="contrPro" maxlength="20" placeholder="Ingresa su contrasena">
                            </th>
                        </tr>
                        <tr class="form-group">
                            <th>
                                <label for="mailPro" class="text-white">
                                    <i class="fas fa-at"></i> Mail de Profesor:
                                </label>
                                <input type="email" class="form-control" name="mailPro" id="mailPro" maxlength="50" placeholder="Ingresa su correo">
                            </th>
                        </tr>
                        <tr class="form-group">
                            <th>
                                <?php
                                $elegirCurso = mysqli_query($conexion, $revisarCurso);
                                if (mysqli_num_rows($elegirCurso) > 0) {
                                ?>
                                    <label for="cadaCurso" class="text-white">
                                        <i class="fas fa-chalkboard"></i> Elegir para Curso:
                                    </label>
                                    <select name="cadaCurso" id="cadaCurso" class="form-select">
                                        <option value="vacio" selected>Selección del curso</option>
                                        <?php
                                        while ($row = mysqli_fetch_array($elegirCurso)) {
                                            echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                <?php
                                }
                                mysqli_free_result($elegirCurso);
                                ?>
                            </th>
                            <th>
                                <div class="form-check">
                                    <input type="checkbox" id="vercurso2" class="form-check-input"></input>
                                    <label for="vercurso2" class="form-check-label text-white">
                                        ¿Quieres segundo curso? (Opcional)
                                    </label>
                                </div>
                                <div id="mascurso2" style="display: none;">
                                    <?php
                                    $elegirCurso2 = mysqli_query($conexion, $revisarCurso);
                                    if (mysqli_num_rows($elegirCurso2) > 0) {
                                    ?>
                                        <label for="cadaCurso2" class="text-white">
                                            <i class="fas fa-chalkboard"></i> Elegir para Segundo Curso:
                                        </label>
                                        <select name="cadaCurso2" id="cadaCurso2" class="form-select">
                                            <option value="vacio" selected>Selección del curso</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($elegirCurso2)) {
                                                echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                    <?php
                                    }
                                    mysqli_free_result($elegirCurso2);
                                    ?>
                                    <br>
                                    <div class="form-check">
                                        <input type="checkbox" id="vercurso3" class="form-check-input"></input>
                                        <label for="vercurso3" class="form-check-label text-white">
                                            ¿Quieres tercero curso? (Opcional)
                                        </label>
                                    </div>
                                    <div id="mascurso3" style="display: none;">
                                        <?php
                                        $elegirCurso3 = mysqli_query($conexion, $revisarCurso);
                                        if (mysqli_num_rows($elegirCurso3) > 0) {
                                        ?>
                                            <label for="cadaCurso3" class="text-white">
                                                <i class="fas fa-chalkboard"></i> Elegir para Tercero Curso:
                                            </label>
                                            <select name="cadaCurso3" id="cadaCurso3" class="form-select">
                                                <option value="vacio" selected>Selección del curso</option>
                                                <?php
                                                while ($row = mysqli_fetch_array($elegirCurso3)) {
                                                    echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        <?php
                                        } else {
                                        ?>
                                            <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                        <?php
                                        }
                                        mysqli_free_result($elegirCurso3);
                                        ?>
                                        <br>
                                        <div class="form-check">
                                            <input type="checkbox" id="vercurso4" class="form-check-input"></input>
                                            <label for="vercurso4" class="form-check-label text-white">
                                                ¿Quieres cuarta curso? (Opcional)
                                            </label>
                                        </div>
                                        <div id="mascurso4" style="display: none;">
                                            <?php
                                            $elegirCurso4 = mysqli_query($conexion, $revisarCurso);
                                            if (mysqli_num_rows($elegirCurso4) > 0) {
                                            ?>
                                                <label for="cadaCurso4" class="text-white">
                                                    <i class="fas fa-chalkboard"></i> Elegir para Cuarta Curso:
                                                </label>
                                                <select name="cadaCurso4" id="cadaCurso4" class="form-select">
                                                    <option value="vacio" selected>Selección del curso</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($elegirCurso4)) {
                                                        echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            <?php
                                            } else {
                                            ?>
                                                <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                            <?php
                                            }
                                            mysqli_free_result($elegirCurso4);
                                            ?>
                                            <br>
                                            <div class="form-check">
                                                <input type="checkbox" id="vercurso5" class="form-check-input"></input>
                                                <label for="vercurso5" class="form-check-label text-white">
                                                    ¿Quieres quinto curso? (Opcional)
                                                </label>
                                            </div>
                                            <div id="mascurso5" style="display: none;">
                                                <?php
                                                $elegirCurso5 = mysqli_query($conexion, $revisarCurso);
                                                if (mysqli_num_rows($elegirCurso5) > 0) {
                                                ?>
                                                    <label for="cadaCurso5" class="text-white">
                                                        <i class="fas fa-chalkboard"></i> Elegir para quinto Curso:
                                                    </label>
                                                    <select name="cadaCurso5" id="cadaCurso5" class="form-select">
                                                        <option value="vacio" selected>Selección del curso</option>
                                                        <?php
                                                        while ($row = mysqli_fetch_array($elegirCurso5)) {
                                                            echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                <?php
                                                } else {
                                                ?>
                                                    <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                                <?php
                                                }
                                                mysqli_free_result($elegirCurso5);
                                                ?>
                                                <br>
                                                <div class="form-check">
                                                    <input type="checkbox" id="vercurso6" class="form-check-input"></input>
                                                    <label for="vercurso6" class="form-check-label text-white">
                                                        ¿Quieres sexto curso? (Opcional)
                                                    </label>
                                                </div>
                                                <div id="mascurso6" style="display: none;">
                                                    <?php
                                                    $elegirCurso6 = mysqli_query($conexion, $revisarCurso);
                                                    if (mysqli_num_rows($elegirCurso6) > 0) {
                                                    ?>
                                                        <label for="cadaCurso6" class="text-white">
                                                            <i class="fas fa-chalkboard"></i> Elegir para sexto Curso:
                                                        </label>
                                                        <select name="cadaCurso6" id="cadaCurso6" class="form-select">
                                                            <option value="vacio" selected>Selección del curso</option>
                                                            <?php
                                                            while ($row = mysqli_fetch_array($elegirCurso6)) {
                                                                echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                                    <?php
                                                    }
                                                    mysqli_free_result($elegirCurso6);
                                                    ?>
                                                    <br>
                                                    <div class="form-check">
                                                        <input type="checkbox" id="vercurso7" class="form-check-input"></input>
                                                        <label for="vercurso7" class="form-check-label text-white">
                                                            ¿Quieres septimo curso? (Opcional)
                                                        </label>
                                                    </div>
                                                    <div id="mascurso7" style="display: none;">
                                                        <?php
                                                        $elegirCurso7 = mysqli_query($conexion, $revisarCurso);
                                                        if (mysqli_num_rows($elegirCurso7) > 0) {
                                                        ?>
                                                            <label for="cadaCurso7" class="text-white">
                                                                <i class="fas fa-chalkboard"></i> Elegir para sexto Curso:
                                                            </label>
                                                            <select name="cadaCurso7" id="cadaCurso7" class="form-select">
                                                                <option value="vacio" selected>Selección del curso</option>
                                                                <?php
                                                                while ($row = mysqli_fetch_array($elegirCurso7)) {
                                                                    echo "<option value='" . $row['nombreCurso'] . "'>" . $row['nombreCurso'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <i class="fas fa-triangle-exclamation"></i> Te falta añadir para curso.
                                                        <?php
                                                        }
                                                        mysqli_free_result($elegirCurso7);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-floppy-disk"></i> Guardar
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <br>

        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
            <div class="text-center">
                <?php include_once "avisar/toasts.html"; ?>
            </div>
        </div>

        <br>
        <div class="animate__animated animate__backInLeft">
            <table style="background-color: #F71806;">
                <thead>
                    <tr>
                        <th>
                            N*
                        </th>
                        <th>
                            Editar
                        </th>
                        <th>
                            Rut
                        </th>
                        <th>
                            Profesor
                        </th>
                        <th>
                            Cursos
                        </th>
                        <th>
                            Cursos 2 (Opcional)
                        </th>
                        <th>
                            Cursos 3 (Opcional)
                        </th>
                        <th>
                            Cursos 4 (Opcional)
                        </th>
                        <th>
                            Cursos 5 (Opcional)
                        </th>
                        <th>
                            Cursos 6 (Opcional)
                        </th>
                        <th>
                            Cursos 7 (Opcional)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $revisarSQLPro = "SELECT * FROM cursoyprofesor";
                    $tablaPro = mysqli_query($conexion, $revisarSQLPro);
                    $sumTotal = 0;
                    if (mysqli_num_rows($tablaPro) > 0) {
                        while ($row = mysqli_fetch_array($tablaPro)) {
                            $sumTotal = $sumTotal + 1;
                            echo "<tr>
                        <th>" . $sumTotal . "</th>
                        <th>
                            <a href='editarProf.php?verId=" . $row['id'] . "'>
                                <button type='button' class='btn btn-primary'>
                                    <i class='fas fa-user-pen'></i>
                                </button>
                            </a>
                        </th>
                        <th>" . $row['rut'] . "</th>
                        <th>" . $row['profesor'] . "</th>
                        <th>" . $row['curso'] . "</th>
                        <th>" . $row['curso2'] . "</th>
                        <th>" . $row['curso3'] . "</th>
                        <th>" . $row['curso4'] . "</th>
                        <th>" . $row['curso5'] . "</th>
                        <th>" . $row['curso6'] . "</th>
                        <th>" . $row['curso7'] . "</th>
                        <th>
                        <a href='subirSQL/sqlProfesor.php?borrarId=" . $row['id'] . "&buscarRut=" . $row['rut'] . "'>                                 
                            <button type='button' id='borrarId' class='btn btn-danger'>
                                <i class='fas fa-trash-can'></i>
                            </button>
                        </a>
                        </th>
                        </tr>";
                        }
                    }
                    mysqli_free_result($tablaPro);
                    ?>
                </tbody>
            </table>
        </div>
        <br>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />

        <script>
            tippy('#anadirCurso', {
                content: "Anadir Curso",
                placement: 'bottom',
                animation: 'scale',
            });

            tippy('#rutPro', {
                content: "Por ejemplo de Rut: 2xx32xxxk no punto ni guion",
                placement: 'bottom',
                animation: 'scale',
            });

            function crearCurso() {
                var faltaNomCurso = document.forms["formCurso"]["nomCurso"].value;
                if (faltaNomCurso == "") {
                    return false;
                }
                return true;
            }

            $(document).ready(function() {
                $("#vercurso2").change(function() {
                    // show hide paragraph on button click
                    $("#mascurso2").slideToggle();
                });

                $("#vercurso3").change(function() {
                    // show hide paragraph on button click
                    $("#mascurso3").slideToggle();
                });

                $("#vercurso4").change(function() {
                    // show hide paragraph on button click
                    $("#mascurso4").slideToggle();
                });

                $("#vercurso5").change(function() {
                    // show hide paragraph on button click
                    $("#mascurso5").slideToggle();
                });

                $("#vercurso6").change(function() {
                    // show hide paragraph on button click
                    $("#mascurso6").slideToggle();
                });

                $("#vercurso7").change(function() {
                    // show hide paragraph on button click
                    $("#mascurso7").slideToggle();
                });
            });

            function crearProfesor() {
                var rutPro = document.forms["formPro"]["rutPro"].value;
                var nomPro = document.forms["formPro"]["nomPro"].value;
                var elegirCurso = document.forms["formPro"]["cadaCurso"].value;
                var userPro = document.forms["formPro"]["userPro"].value;
                var passPro = document.forms["formPro"]["contrPro"].value;
                var correoPro = document.forms["formPro"]["mailPro"].value;
                if (rutPro == "" || rutPro == null) {
                    $(document).ready(function() {
                        $('.errorRutPro').toast('show');
                    });
                    return false;
                }
                if (nomPro == "" || nomPro == null) {
                    $(document).ready(function() {
                        $('.errorNomPro').toast('show');
                    });
                    return false;
                }
                if (elegirCurso == "vacio") {
                    $(document).ready(function() {
                        $('.errorCursoPro').toast('show');
                    });
                    return false;
                }

                if (userPro == "" || userPro == null) {
                    $(document).ready(function() {
                        $('.errorUserPro').toast('show');
                    });
                    return false;
                }

                if (passPro == "" || passPro == null) {
                    $(document).ready(function() {
                        $('.errorPassPro').toast('show');
                    });
                    return false;
                }

                if (correoPro == "" || correoPro == null) {
                    $(document).ready(function() {
                        $('.errorCorreoPro').toast('show');
                    });
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