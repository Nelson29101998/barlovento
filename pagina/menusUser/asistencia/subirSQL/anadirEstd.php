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

    $verRut = $_POST['cadaEstudiante'];

    $buscarRut = 'SELECT * FROM estudiante WHERE rut="' . $verRut . '"';

    $sacarCurso1 = $_POST['sacarCurso1'];

    $sacarEstudiante = mysqli_query($conexion, $buscarRut);
    if (mysqli_num_rows($sacarEstudiante) == 1) {
        while ($row = mysqli_fetch_array($sacarEstudiante)) {
            $sacarNom = $row['nombre'];
            $sacarTel = $row['telefono'];
            $sacarMail = $row['mail'];
        }
    }

    $sqlCurso1 = "INSERT INTO asistencias(rut, estudiante, cursos, telefono, mail, fecha, asistencia, total) 
    VALUES ('".$verRut."','".$sacarNom."','".$sacarCurso1."','".$sacarTel."','".$sacarMail."','".date('Y-m-d')."','Ausente','0')";

    if ($_POST['sacarCurso2']!= "vacio") {
        $sacarCurso2 = $_POST['sacarCurso2'];
        $sqlCurso2 = "INSERT INTO asistencias(rut, estudiante, cursos, telefono, mail, fecha, asistencia, total) 
        VALUES ('".$verRut."','".$sacarNom."','".$sacarCurso2."','".$sacarTel."','".$sacarMail."','".date('Y-m-d')."','Ausente','0')";
    }    else{
        $sqlCurso2 = "";
    }

    if ($_POST['sacarCurso3'] != "vacio") {
        $sacarCurso3 = $_POST['sacarCurso3'];
        $sqlCurso3 = "INSERT INTO asistencias(rut, estudiante, cursos, telefono, mail, fecha, asistencia, total) 
        VALUES ('".$verRut."','".$sacarNom."','".$sacarCurso3."','".$sacarTel."','".$sacarMail."','".date('Y-m-d')."','Ausente','0')";
    }else{
        $sqlCurso3 = "";
    }

    if ($_POST['sacarCurso4'] != "vacio") {
        $sacarCurso4 = $_POST['sacarCurso4'];
        $sqlCurso4 = "INSERT INTO asistencias(rut, estudiante, cursos, telefono, mail, fecha, asistencia, total) 
        VALUES ('".$verRut."','".$sacarNom."','".$sacarCurso4."','".$sacarTel."','".$sacarMail."','".date('Y-m-d')."','Ausente','0')";
    }else{
        $sqlCurso4 = "";
    }

    if ($_POST['sacarCurso5'] != "vacio") {
        $sacarCurso5 = $_POST['sacarCurso5'];
        $sqlCurso5 = "INSERT INTO asistencias(rut, estudiante, cursos, telefono, mail, fecha, asistencia, total) 
        VALUES ('".$verRut."','".$sacarNom."','".$sacarCurso5."','".$sacarTel."','".$sacarMail."','".date('Y-m-d')."','Ausente','0')";
    }else{
        $sqlCurso5 = "";
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

        <title>Subiendo de Estudiante</title>
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
        if ($conexion->query($sqlCurso1) === TRUE) {
            echo "OK 1";
            if(!empty($sqlCurso2)){            
                if($conexion->query($sqlCurso2) === TRUE){
                    echo "OK 2";
                }
            } 
            if(!empty($sqlCurso3)){            
                if($conexion->query($sqlCurso3) === TRUE){
                    echo "OK 3";
                }
            } 
            if(!empty($sqlCurso4)){            
                if($conexion->query($sqlCurso4) === TRUE){
                    echo "OK 4";
                }
            } 
            if(!empty($sqlCurso5)){            
                if($conexion->query($sqlCurso5) === TRUE){
                    echo "OK 5";
                }
            }
            header("location: ../asistencia.php");
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