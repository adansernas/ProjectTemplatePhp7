function logout() {
    $.post("Autenticacion/terminarSesion.data", {
    }, function (respuesta) {
        if (respuesta.status2) {
            setTimeout(function () {
                location.reload(true);
            }, 1000);
        }
    }, "json");
}
$(function () {
    $.ajaxSetup({
        type: "POST"
        , async: true
        , dataType: "json"
        , contentType: "application/x-www-form-urlencoded"
        , timeout: 300000
        , error: function ( ) {
        }
        , beforeSend: function ( ) {
        }
    });

    $(document.body).on('hide.bs.modal', function () {
        $('body').css('padding-right', 0);
    }).on('hidden.bs.modal', function () {
        $('body').css('padding-right', 0);
    });

    $(document.body).on('show.bs.modal', function () {
        $('body').css('padding-right', 0);
    }).on('shown.bs.modal', function () {
        $('body').css('padding-right', 0);
    });

});
