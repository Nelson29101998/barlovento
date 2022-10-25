<?php
include_once "../../ajuste/config.php";
session_start();
if (count($_COOKIE) > 0 && (!empty($_COOKIE['nameCookieEstd'])
 || !empty($_COOKIE['userCookieEstd']) || !empty($_COOKIE['rutCookieEstd']))) {
    //*Nombre
    $_SESSION['nombre'] = $_COOKIE['nameCookieEstd'];

    //* usuario
    $_SESSION['usuario'] = $_COOKIE['userCookieEstd'];

    //*Rut
    $_SESSION['rut'] = $_COOKIE['rutCookieEstd'];

    header("Location: ../menusEstd/menu.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../disenoMejor/bootstrap/css/bootstrap.min.css">
        <script src="../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../disenoMejor/fontawesome/css/all.min.css">
        <script script="../../disenoMejor/fontawesome/js/all.min.js"></script>

        <link rel="stylesheet" href="../../disenoMejor/MDBootstrap/css/mdb.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <title>Estudiante</title>
        
        <?php
        //! Favicon
        $direccion = "../../";
        include_once $direccion . "ajuste/favicon.php";
        ?>

        <link rel="stylesheet" href="css/ordenar.css?v=<? echo $version; ?>">
        <style>
            table {
                margin-left: auto;
                margin-right: auto;
                background-color: #F71806;
            }

            td,
            th {
                text-align: left;
                padding: 8px;
            }
        </style>
    </head>

    <body>

        <br>
        <div class="container">
            <div class="animate__animated animate__flipInX animate__delay-1s">
                <div class="text-center">
                    <h1 id="disenoLetra" class="text-white">
                        Estudiante de Centro Barlovento
                    </h1>
                </div>
            </div>
            <br>
            <div class="animate__animated animate__backInLeft">
                <div id="formColor" class="container">
                    <br>
                    <form id="formCuenta" name="formCuenta" method="post" onsubmit="return abrirCuentaAdmn()" action="../buscando/buscarUser.php">
                        <table>
                            <tbody>
                                <tr class="form-group">
                                    <th>
                                        <label for="user" class="text-white">
                                            <i class="fas fa-user"></i> Nombre de Usuario:
                                        </label>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="user" id="user" placeholder="Ingresa su usuario">
                                    </th>
                                </tr>
                                <tr class="form-group">
                                    <th>
                                        <label for="contrs" class="text-white">
                                            <i class="fas fa-key"></i> Conteaseña:
                                        </label>
                                    </th>
                                    <th>
                                        <input type="password" class="form-control" name="contrs" id="contrs" placeholder="Ingresa en la conteaseña">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-door-open"></i> Entrar
                            </button>
                            <button onclick="volverPag()" class="btn btn-primary" type="button" class="btn btn-primary">
                                <i class="fas fa-reply"></i> Volver
                            </button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <br>
        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
            <div class="text-center">
                <?php include_once "avisar/toasts.html"; ?>
            </div>
        </div>

        <br>

        <?php include_once "../../espacioHTML/footers.html"; ?>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../../disenoMejor/bootstrap/js/bootstrap.bundle.min.js"></script>
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

            function abrirCuentaAdmn() {
                var nomUser = document.forms["formCuenta"]["user"].value;
                var contr = document.forms["formCuenta"]["contrs"].value;

                if (nomUser == "" || nomUser == null) {
                    $(document).ready(function() {
                        $('.errorUser').toast('show');
                    });
                    return false;
                }

                if (contr == "" || contr == null) {
                    $(document).ready(function() {
                        $('.errorPass').toast('show');
                    });
                    return false;
                }
            }
        </script>
    </body>

    </html>
<?php
}
?>