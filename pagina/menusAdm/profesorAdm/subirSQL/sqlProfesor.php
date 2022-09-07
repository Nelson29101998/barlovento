<?php
session_start();
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rut"])) {
    header("location: ../../../../inicio.html");
} else {
    $use = $_SESSION["usuario"];
    $_SESSION["usuario"] = $use;

    $rut = $_SESSION["rut"];
    $_SESSION["rut"] = $rut;

    include_once "../../../../conectarSQL/conectar_SQL.php";

    if (!empty($_GET['ajuste']) == "anadir") {
        $rutPro = $_POST['rutPro'];
        $nomPro = $_POST['nomPro'];

        $userPro = $_POST['userPro'];
        $correoPro = $_POST['mailPro'];
        $passwordPro = $_POST['contrPro'];

        $sqlCuentaPro = "INSERT INTO profesor (rut, nombre, usuario, mail, clave)
        VALUES ('".$rutPro."','".$nomPro."','".$userPro."','".$correoPro."','".$passwordPro."')";

        $cursoPro1 = $_POST['cadaCurso'];

        if (!empty($_POST['cadaCurso2'])) {
            $cursoPro2 = $_POST['cadaCurso2'];
        } else {
            $cursoPro2 = "";
        }

        if (!empty($_POST['cadaCurso3'])) {
            $cursoPro3 = $_POST['cadaCurso3'];
        } else {
            $cursoPro3 = "";
        }

        if (!empty($_POST['cadaCurso4'])) {
            $cursoPro4 = $_POST['cadaCurso4'];
        } else {
            $cursoPro4 = "";
        }

        if (!empty($_POST['cadaCurso5'])) {
            $cursoPro5 = $_POST['cadaCurso5'];
        } else {
            $cursoPro5 = "";
        }

        if (!empty($_POST['cadaCurso6'])) {
            $cursoPro6 = $_POST['cadaCurso6'];
        } else {
            $cursoPro6 = "";
        }

        if (!empty($_POST['cadaCurso7'])) {
            $cursoPro7 = $_POST['cadaCurso7'];
        } else {
            $cursoPro7 = "";
        }

        $sql =
        "INSERT INTO cursoyprofesor (rut, profesor, curso, curso2, curso3, curso4, curso5, curso6, curso7) 
        VALUES ('" . $rutPro . "','" . $nomPro . "','" . $cursoPro1 . "','" . $cursoPro2 . "','" . $cursoPro3 . "','" . $cursoPro4 . "','" . $cursoPro5 . "','" . $cursoPro6 . "','" . $cursoPro7 . "')";
    }

    if(!empty($_GET['borrarId']) && $_GET['buscarRut']){
        $sql = "DELETE FROM cursoyprofesor WHERE id=".$_GET['borrarId']."";
        $sqlCuentaPro = "DELETE FROM profesor WHERE rut=".$_GET['buscarRut']."";
    }
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../../disenoMejor/bootstrap/css/bootstrap.min.css">
        <script src="../../../../disenoMejor/bootstrap/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../../../disenoMejor/fontawesome/css/all.min.css">
        <script script="../../../../disenoMejor/fontawesome/js/all.min.js"></script>

        <link rel="stylesheet" href="../../../../disenoMejor/MDBootstrap/css/mdb.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <title>Subiendo de Curso</title>
        <link rel="icon" type="image/png" href="../../../../image/icon_Barlovento.png" />
        <style>
            body {
                background-color: #2689F9;
                color: white;
            }

            img {
                width: 30%;
                border-radius: 45px;
            }

            @media (max-width: 600px) {
                img {
                    width: 50%;
                    border-radius: 45px;
                }
            }
        </style>
    </head>

    <body>
        <?php
        if (($conexion->query($sql) === TRUE) && ($conexion->query($sqlCuentaPro) === TRUE)) {
            header("Location: ../profesor.php");
        } else {
            echo "<br>
    <center>
    <img src='../../../../image/barloventoMal.jpg' class='img-fluid'>
    <h1 class='display-4'>No pudo subir. Algo problema.</h1>
    <a href='javascript:history.back()'>
    <button type='button' class='btn btn-primary'>
    <i class='fa-solid fa-reply'></i> Volver
    </button>
    </a>
    </center>
    <br>";
            echo "Error: " . $sql . $conexion->error;
        }

        $conexion->close();
        ?>
    </body>

    </html>

<?php
}
?>