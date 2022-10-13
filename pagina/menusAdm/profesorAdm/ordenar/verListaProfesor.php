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