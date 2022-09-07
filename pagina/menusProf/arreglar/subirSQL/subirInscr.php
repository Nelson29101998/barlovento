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

    //* Tabla de Participante
    $nomPartc = $_POST["nombreParticipante"];
    $edadPartc = $_POST["edadPartc"];
    $nacePartc = date("Y-m-d", strtotime($_POST["nacePartc"]));
    $rutPartc = $_POST["rutPartc"];
    $telPartc = $_POST["telefonoPartc"];
    $correoPartc = $_POST["correoPartc"];
    $dirPartc = $_POST["direccionPartc"];
    $vivePartc = $_POST["vivePartc"];

    //* Tabla de Apoyo
    $nombreApoyo = $_POST["nombreApoyo"];
    $parentesco = $_POST["parentesco"];
    $rutApoyo = $_POST["rutApoyo"];
    $telefonoApoyo = $_POST["telefonoApoyo"];
    $telefonoApoyoOtro = $_POST["telefonoApoyoOtro"];
    $correoApoyo = $_POST["correoApoyo"];
    $direccionApoyo = $_POST["direccionApoyo"];

    //*Tabla de la cuenta de estudiante.
    $userEstudiante = $_POST["userEstudiante"];
    $passEstudiante = $_POST["passEstudiante"];

    //* Tabla de Médicos
    $diagnostico = $_POST["diagn"];
    $medico = $_POST["medico"];
    $medicaHora = $_POST["medicaHora"];
    $otroMedico = $_POST["otroMedico"];

    //* Tabla de Salud
    $preSalud = $_POST["preSalud"];
    $alergia = $_POST["alergia"];
    $hospital = $_POST["hospital"];
    $segurosSalud = $_POST["segurosSalud"];

    //* Tabla de contactos en caso de emergencia
    $contUnoNom = $_POST["contUnoNom"];
    $contDosNom = $_POST["contDosNom"];
    $contUnoParent = $_POST["contUnoParent"];
    $contDosParent = $_POST["contDosParent"];
    $contUnoPhone = $_POST["contUnoPhone"];
    $contDosPhone = $_POST["contDosPhone"];


    $sql = "INSERT INTO inscripcion(nombrePartc, edad, nacePartc, rutPartc, celularPartc, mailPartc,
     direccionPartc, vivePartc, nombreApoyo, parentesco, rutApoyo, celularApoyo, otroTelApoyo, mailApoyo,
     direccionApoyo, diagnostico, medicoTratantes, medicaHora, otroMedico, previsionSalud, alergias, preferencia,
     segurosSalud, nomCont1, nomCont2, parentCont1, parentCont2, celCont1, celCont2) VALUES
      ('" . $nomPartc . "', '" . $edadPartc . "', '" . $nacePartc . "', '" . $rutPartc . "', '" . $telPartc . "',
       '" . $correoPartc . "', '" . $dirPartc . "', '" . $vivePartc . "',
      '" . $nombreApoyo . "', '" . $parentesco . "', '" . $rutApoyo . "', '" . $telefonoApoyo . "', 
      '" . $telefonoApoyoOtro . "', '" . $correoApoyo . "', '" . $direccionApoyo . "',
      '" . $diagnostico . "', '" . $medico . "', '" . $medicaHora . "', '" . $otroMedico . "',
       '" . $preSalud . "', '" . $alergia . "','" . $hospital . "', '" . $segurosSalud . "',
      '" . $contUnoNom . "', '" . $contDosNom . "', '" . $contUnoParent . "', '" . $contDosParent . "',
      '" . $contUnoPhone . "','" . $contDosPhone . "')";


      $sqlUserStudy = "INSERT INTO estudiante (rut, nombre, usuario, telefono, mail, clave) 
      VALUES ('" . $rutPartc . "','" . $nomPartc . "','" . $userEstudiante . "',
      '" . $telPartc . "','" . $correoPartc . "','" . $passEstudiante . "')";
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

        <title>Subiendo de inscripción</title>
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
        if (($conexion->query($sql) === TRUE) && ($conexion->query($sqlUserStudy) === TRUE)) {
            echo "<br>
    <center>
    <img src='../../../../image/barloventosOk.jpg' class='img-fluid'>
    <h1 class='display-4'>Has guardo su exito. Muchas gracias por preferirnos.</h1>
    <a href='javascript:history.back()'>
    <button type='button' class='btn btn-primary'>
    <i class='fa-solid fa-reply'></i> Volver
    </button>
    </a>
    </center>";
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