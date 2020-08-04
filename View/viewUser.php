
<?php
include 'head.php';
include '../Model/information_usersModel.php';
$objInfUserModel = new information_usersModelClass();
$datainfusr = $objInfUserModel->get_Users();
?>


<html>
    <head>
        <link href="resources/css/lib/datatables.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <script src="resources/js/lib/datatables.min.js" type="text/javascript"></script>
        <script src="../Static/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="../Static/js/tablaArchivo.js" type="text/javascript"></script>
    </head>
    <body>
        <br>
        <br>
        <!-- Contenedor Pagina -->
        <div class="container">


            <form >


                <div class="card">
                    <div class="card-header bg-secondary text-white">

                        <a  title="Descargar" href="../Controller/ControllerGenFile.php?opcion=1" >
                            <i class="fas fa-download"></i>
                        </a>&nbsp; &nbsp; Usuarios activos  
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"> </h5>
                        <div class="card-text">

                            <table id="usrActivo" class="dtable striped centered">
                                <thead>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>    
                                </thead>
                                <tbody>
                                    <?php
                                    $contadorFila = 1;
                                    if (is_array($datainfusr)) {
                                        foreach ($datainfusr as $valor) {

                                            if ($valor["status_id"] == 1) {
                                                ?>

                                                <tr id="<?php echo "Fila_" . $contadorFila; ?>">
                                                    <td><?php echo $valor["email"] ?></td>
                                                    <td><?php echo $valor["name"] ?></td>
                                                    <td><?php echo $valor["last_name"] ?></td>
                                                    <td><a  title="Eliminar" onclick="Elimina_Elemento('<?php echo $valor["user_id"]; ?>');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        &nbsp;
                                                        &nbsp;
                                                        &nbsp;


                                                    </td>
                                                </tr>


                                                <?php
                                            }
                                            $contadorFila++;
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

                <br>
                <br>

                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <a  title="Descargar" href="../Controller/ControllerGenFile.php?opcion=2" >
                            <i class="fas fa-download"></i>
                        </a>&nbsp; &nbsp; Usuarios Inactivos
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"></h5>
                        <div class="card-text">

                            <table id="isrInactivo" class="dtable striped centered">
                                <thead>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>    
                                </thead>
                                <tbody>
                                    <?php
                                    $contadorFila = 1;
                                    if (is_array($datainfusr)) {
                                        foreach ($datainfusr as $valor) {

                                            if ($valor["status_id"] == 2) {
                                                ?>

                                                <tr id="<?php echo "Fila_" . $contadorFila; ?>">
                                                    <td><?php echo $valor["email"] ?></td>
                                                    <td><?php echo $valor["name"] ?></td>
                                                    <td><?php echo $valor["last_name"] ?></td>
                                                    <td><a  title="Eliminar" onclick="Elimina_Elemento('<?php echo $valor["user_id"]; ?>');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        &nbsp;
                                                        &nbsp;
                                                        &nbsp;


                                                    </td>
                                                </tr>


                                                <?php
                                            }
                                            $contadorFila++;
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>
                <br>
                <br>
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <a  title="Descargar" href="../Controller/ControllerGenFile.php?opcion=3" >
                            <i class="fas fa-download"></i>
                        </a>&nbsp; &nbsp;Usuarios en Espera
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"></h5>
                        <div class="card-text">

                            <table id="usrEspera" class="dtable striped centered">
                                <thead>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Acciones</th>    
                                </thead>
                                <tbody>
                                    <?php
                                    $contadorFila = 1;
                                    if (is_array($datainfusr)) {
                                        foreach ($datainfusr as $valor) {
                                            if ($valor["status_id"] == 3) {
                                                ?>

                                                <tr id="<?php echo "Fila_" . $contadorFila; ?>">
                                                    <td><?php echo $valor["email"] ?></td>
                                                    <td><?php echo $valor["name"] ?></td>
                                                    <td><?php echo $valor["last_name"] ?></td>
                                                    <td><a  title="Eliminar" onclick="Elimina_Elemento('<?php echo $valor["user_id"]; ?>');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        &nbsp;
                                                        &nbsp;
                                                        &nbsp;


                                                    </td>
                                                </tr>


                                                <?php
                                            }
                                            $contadorFila++;
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>


                <input type='hidden' id='data' value='<?php echo json_encode($datainfusr); ?>'>
                <script src = "../Static/js/accionesListado.js" type = "text/javascript"></script>


            </form>         
            <button type="button" id="regresar" name="regresar" class="btn btn-outline-success">Regresar</button>
            <!-- Footer Pagina -->
            <footer class="page-footer font-small blue">


                <div class="footer-copyright text-center py-3">© 2020 Copyright: Realizado por Hernan Gonzalez
                </div>


            </footer>

        </div>
    </body>
</html>
