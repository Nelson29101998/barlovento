<option value="vacio" selected>Selección del curso</option>
<?php
include_once "../../../conectarSQL/conectar_SQL.php";

$revisarEstudiante ="SELECT * FROM estudiante";

$resultadosEstudiante = mysqli_query($conexion, $revisarEstudiante);
if (mysqli_num_rows($resultadosEstudiante) > 0) {
    while ($row = mysqli_fetch_array($resultadosEstudiante)) {
        echo "<option value='".$row['rut']."'>".$row['rut']." ".$row['nombre']."</option>";
    }
}
mysqli_free_result($resultadosEstudiante);
?>