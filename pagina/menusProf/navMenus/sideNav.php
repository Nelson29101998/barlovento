<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: red;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .footer {
        width: 100%;
        position: absolute;
        bottom: 0;
    }

    .title {
        display: block;
        border-top: 5px solid #2689F9;
        height: 30px;
        line-height: 30px;
        padding: 4px 6px;
        font-size: 16px;
        margin-bottom: 13px;
        clear: both;
    }

    .title .derecha {
        float: right;
    }

    .title .centro {
        top: 50%;
        left: 50%;
        margin-top: 100px;
        margin-left: 100px;
    }

    .title .izquierda {
        float: left;
    }
</style>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: white;">
        &times;
    </a>
    <?php
    $verServer = $_SERVER['SERVER_NAME'];
    if ($verServer == 'barlovento.herokuapp.com') {
        $sacar = "/";
    } else {
        $sacar = "/centroBarlovento/";
    }

    if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusAdm/menu.php") {
        include_once "../../conectarSQL/conectar_SQL.php";
        require_once "../../ajuste/MobileDetect/Mobile_Detect.php";
    } else {
        include_once "../../../conectarSQL/conectar_SQL.php";
        require_once "../../../ajuste/MobileDetect/Mobile_Detect.php";
    }

    $detect = new Mobile_Detect;

    $espacioSQL = "SHOW TABLE STATUS";

    $resultados = mysqli_query($conexion, $espacioSQL);
    $tamano = 0;
    if (mysqli_num_rows($resultados) > 0) {
        while ($row = mysqli_fetch_array($resultados)) {
            $tamano += $row["Data_length"] + $row["Index_length"];
        }
    }

    if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/menu.php") {
    ?>
        <a href="../menu.php">
            <button type="button" class="btn btn-primary">
                <i class="fas fa-house-chimney"></i> Menú
            </button>
        </a>
    <?php
    }
    if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/asistenciaAdm/asistencia.php") {
        if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusProf/menu.php") {
            echo '<a href="asistenciaAdm/asistencia.php">';
        } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/menu.php") {
            echo '<a href="../asistenciaAdm/asistencia.php">';
        }
    ?>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-clipboard-list"></i> Asistencia
        </button>
        </a>
    <?php
    }
    if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/arreglar/fichaDeParticipante.php") {
        if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusProf/menu.php") {
            echo '<a href="arreglar/fichaDeParticipante.php">';
        } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/menu.php") {
            echo '<a href="../arreglar/fichaDeParticipante.php">';
        }
    ?>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-clipboard-user"></i> Ficha de participantes
        </button>
        </a>
    <?php
    }
    if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusProf/menu.php") {
        echo '<a href="../buscando/cerrarCuenta.php">';
    } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/menu.php") {
        echo '<a href="../../buscando/cerrarCuenta.php">';
    }
    ?>
    <button type="button" class="btn btn-primary">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </button>
    </a>

    <div class="footer text-center">
        <?php
        if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusProf/menu.php") {
            echo '<img src="../../image/logo_barlovento.png" class="img-fluid" alt="logo_CentroBarlovento">';
        } else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/menu.php") {
            echo '<img src="../../../image/logo_barlovento.png" class="img-fluid" alt="logo_CentroBarlovento">';
        }
        ?>
        <span>© 2018 - <?php echo date("Y"); ?></span>
        <span><?php echo $verServer; ?></span>
    </div>
</div>

<div class="container-fluid">
    <div class="title">
        <span style="font-size:30px;cursor:pointer;" class="izquierda" onclick="openNav()">&#9776; Abrir</span>
        <?php
        if (!($detect->isMobile())) {
        ?>
            <span class="centro">
                <?php
                $mbytes = number_format($tamano / (1024 * 1024), 2);
                echo $mbytes . " MB Espacio de la base de datos. Maximo de 5 MB.";
                ?>
            </span>
        <?php
        }
        ?>
        <span style="font-size:20px;cursor:pointer;" class="badge badge-primary derecha" id="verReloj"></span>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_URI"] == $sacar . "pagina/menusProf/menu.php") {
    echo '<script src="../../moment/moment.min.js"></script>';
} else if ($_SERVER["REQUEST_URI"] !== $sacar . "pagina/menusProf/menu.php") {
    echo '<script src="../../../moment/moment.min.js"></script>';
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    var tiempoDato = null,
        datos = null;

    var actualizar = function() {
        datos = moment(new Date());
        tiempoDato.html(datos.format('DD-MM-YYYY HH:mm a '));
    };

    $(document).ready(function() {
        tiempoDato = $('#verReloj');
        actualizar();
        setInterval(actualizar, 1000);
    });
</script>