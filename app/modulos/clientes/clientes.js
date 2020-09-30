
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 28/09/2020 21:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

listarClientes();

$("#formAddCliente").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnAgregarCliente", true)
    datos.append("method", 'AJAX')

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/clientes/clientes.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $(".cls").val("")
                $('#mdlCliente').modal('hide')

                $('#vts_cliente option').remove();
                listarClientes();
                $("#vts_cliente option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})


function listarClientes() {
    var datos = new FormData()

    datos.append("btnListarClientes", true)

    $.ajax({
        type: "POST",
        url: urlApp + './app/modulos/clientes/clientes.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            res.forEach(element => {

                $('#vts_cliente').prepend(`<option value='${element.cts_id}' >${element.cts_nombre}</option>`);

            });




        }
    });
}
