<?php
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
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        //* Conectar a Python
        include_once "../../../ajuste/python/conectarPython.html";
        ?>
        <link rel="stylesheet" href="../../../disenoMejor/bootstrap/css/bootstrap.min.css">
        <script src="../../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../../disenoMejor/fontawesome/css/all.min.css">
        <script script="../../../disenoMejor/fontawesome/js/all.min.js"></script>

        <link rel="stylesheet" href="../../../disenoMejor/MDBootstrap/css/mdb.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <title>Ver Grafico</title>
        
        <?php
        //! Favicon
        $direccion = "../../../";
        include_once $direccion . "ajuste/favicon.php";
        ?>

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
        </style>
        <?php
        //* Conectar a Py-Confg
        include_once "pythonScript/pyConfg.html";
        //* Conectar a Py-Env
        include_once "pythonScript/pyEnv.html";
        ?>
    </head>

    <body>
        <?php
        //*SideNav y Hora
        include_once "../navMenus/sideNav.php";
        ?>
        <br>
        <div class="container">
            <div class="text-center">
                <h1>Grafico</h1>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <table>
                <tbody>
                    <tr>
                        <th>
                           <p style="text-align: center">Numero de Asistencias</p>
                            <py-script>
                                import numpy as np
                                from personas import personal
                                nombre = np.array(["Yo", "Tu", "El", "Ella", "Nos"])
                                listanum = np.array([
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo rand(40, 100) . ", ";
                                }
                                ?>
                                ])
                                personal(listanum, nombre)
                            </py-script>
                        </th>
                        <th>
                            gh
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </body>

    </html>
<?php
}
?>