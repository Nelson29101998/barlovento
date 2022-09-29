<?php
$verServer = $_SERVER['SERVER_NAME'];
if ($verServer == 'barlovento.herokuapp.com') {
    $sacar = "/";
} else {
    $sacar = "/centroBarlovento/";
}
//setcookie("Bienvenido", "hi", time() + (86400 * 30), "/");
if (count($_COOKIE) > 0) {
    echo '<script>console.log("Cookies sopotadas")</script>';
} else {
    echo '<script>console.log("Cookies no sopotadas")</script>';
    if ($_SERVER["REQUEST_URI"] !== $sacar . "/" || $_SERVER["REQUEST_URI"] !== $sacar . "index.php") {
?>
        <div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tituloVentana"><i class="fas fa-cookie"></i> Avisar Cookies</h5>
                    </div>
                    <div class="modal-body">
                        <p>Utilizamos cookies para optimizar nuestro sitio web y nuestro servicio.</p>
                        <a class="learn-more" href="#">Leer mas<i class="fa fa-angle-right ml-2"></i></a>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="noGracias()">
                            <i class="fas fa-cookie-bite"></i> No, Gracias
                        </button>
                        <button type="button" class="btn btn-primary" onclick="cerrarVentanaOk()">
                            <i class="fas fa-cookie-bite"></i> Ok
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById("ventanaModal"));
            document.onreadystatechange = function() {
                myModal.show();
            }

            function cerrarVentanaOk() {
                var now = new Date();
                var time = now.getTime();
                var expireTime = time + 30000 * 36000;
                now.setTime(expireTime);
                document.cookie = "verVentana=Cerrar; expires="+now.toUTCString()+"; path=/";
                myModal.hide();
            }

            function noGracias() {                
                myModal.hide();
            }
        </script>
<?php
    }
}
?>