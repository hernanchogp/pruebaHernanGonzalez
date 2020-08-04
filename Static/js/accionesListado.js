

$(document).ready(function () {
    var dataTable = $('.dtable').dataTable();
    $("#regresar").click(function () {
        $(location).attr('href', 'index.php');

    })

    $("#generaArchivo").click(function () {

    });

});


function Elimina_Elemento(id) {

    var data = {
        'idUsr': id,
        'opc': 1
    };
    $.ajax({
        type: 'POST',
        url: '../Controller/ControllerData.php',
        data: data,
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            if (data.estado == "OK") {
                swal({
                    title: "Correcto",
                    text: data.contenido,
                    icon: "success"
                }).then((value) => {
                    location.reload();
                });

            } else {
                swal("Error", data.contenido, "error");
            }

        }
    })

}

