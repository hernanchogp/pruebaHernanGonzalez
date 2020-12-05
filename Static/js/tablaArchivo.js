$(document).ready(function () {


    
    $("#tabla").DataTable({
        language: {url: "resources/js/lib/spanish.json"},
        initComplete: function () {
            $('input[type=search]').addClass("browser-default");
            $('select[name="tabla_length"]').addClass("browser-default");
        }
        
    });
});

