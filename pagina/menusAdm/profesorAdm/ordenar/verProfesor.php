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

<?php
//* Lista de Profesor
include_once "verListaProfesor.php"
?>