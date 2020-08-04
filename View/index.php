<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!-- header estatico -->
        <?php
        include 'head.php';
        ?>
        <!-- CSS principal -->        
        <link href="../Static/css/file.css" rel="stylesheet" type="text/css"/>
        <!-- JS principal -->
        <script src="../Static/js/procesaArchivo.js" type="text/javascript"></script>
        
    </head>
    <body>
        <br>
        <br>
        <!-- Contenedor Pagina -->
        <div class="container">
            <!-- Encabezado Pagina -->

            <div class="card">
                <div class="card-header bg-secondary text-white">
                    GEMA SAS
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Formulario de carga de información.</h5>
                    <div class="card-text">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">   
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="grupofile">Archivo</span>
                                        </div>
                                        <div class="custom-file">

                                            <input type="file" class="custom-file-input" id="archivo_cargar" name="archivo_cargar" aria-describedby="archivo_cargar">
                                            <label class="custom-file-label" for="archivo_cargar">Seleccione Archivo</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" id="enviaArchivo" name="enviaArchivo" class="btn btn-outline-success">Enviar Formulario</button>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="mensaje">

                            </div>
                        </div>
                        <div class="form-group">
                            <div id="contenido">

                            </div>
                        </div>
                    </div>

                </div>
            </div>




            <!-- Footer Pagina -->
            <footer class="page-footer font-small blue">


                <div class="footer-copyright text-center py-3">© 2020 Copyright: Realizado por Hernan Gonzalez
                </div>


            </footer>
        </div>
    </body>
</html>
