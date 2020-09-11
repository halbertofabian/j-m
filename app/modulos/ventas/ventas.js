$(document).on("ready", function () {

})
listarVendedores();
listarClientes();

$("#formAddVendedor").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearVendedor", true)

    $.ajax({
        type: "POST",
        url: './app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#usr_nombre").val("")
                $('#mdlVendedor').modal('hide')

                $('#vts_vendedor option').remove();
                listarVendedores();
                $("#vts_vendedor option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})



function listarVendedores() {
    var datos = new FormData()

    datos.append("btnListarVendedores", true)

    $.ajax({
        type: "POST",
        url: './app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            res.forEach(element => {

                $('#vts_vendedor').prepend(`<option value='${element.usr_id}' >${element.usr_nombre}</option>`);

            });




        }
    });
}




$("#formAddCliente").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearCliente", true)

    $.ajax({
        type: "POST",
        url: './app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#cts_nombre").val("")
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
        url: './app/modulos/ventas/ventas.ajax.php',
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


$(".inputN").number(true, 2);

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;
// Siempre serÃ¡ validado, incluso si #undiv no existe
// document.getElementsByClassName('theDate').value = today;
$(".theDate").val(today)

