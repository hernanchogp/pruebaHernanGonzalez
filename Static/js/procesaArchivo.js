var app = (function () {
    $(document).ready(function () {

        $('#archivo_cargar').on('change', function () {
            //Se trae el basename del archivo seleccionado
            var nombreArchivo = $(this)[0].files[0].name;

            //Se reemplaza el valor del label 
            $(this).next('.custom-file-label').html(nombreArchivo);
        });

        $("#enviaArchivo").click(function () {

            CargaArchivoSeleccionado();

        });

        var cerrarMensaje = function () {
            $("#mensaje").empty();
        }



        var CargaArchivoSeleccionado = function () {
            /* Se trae la propieda del file y su nombre*/
            if ($("#archivo_cargar").val().trim() != '') {
                var file = $("#archivo_cargar")[0].files[0];
                var nombreArchivo = $("#archivo_cargar")[0].files[0].name;
                var size = $("#archivo_cargar")[0].files[0].size;
                if (size > 0) {
                    var data = new FormData();
                    /* se agregan valores requeridos al form data para realizar la peticion ajax */
                    data.append(nombreArchivo, file);

                    $.ajax({
                        type: 'POST',
                        url: '../Controller/ControllerFile.php',
                        data: data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        async: false,
                        beforeSend: function (xhr) {
                            $("#enviaArchivo").addClass("disabled");
                        },
                        success: function (data, textStatus, jqXHR) {
                            console.log(data);
                            if (data.estado == "OK") {
                                $(location).attr('href', 'viewUser.php');

                            } else {
                                swal("Error", data.contenido, "error");
                            }
                            $("#enviaArchivo").removeClass("disabled");
                        }
                    })
                } else {

                    swal("Error", "El archivo seleccionado no contiene información", "error")
                }
            } else {

                swal("Error", "No se ha se ha seleccionado un archivo", "error")
            }
        }
        return {
            cargaFile: CargaArchivoSeleccionado,
            cerrar: cerrarMensaje()
        };
    });
})();