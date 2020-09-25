





listarProveedores();

$("#formAddProveedor").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearProveedor", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/compras/compras.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#pvs_nombre").val("")
                $('#mdlProveedor').modal('hide')

                $('#cps_proveedor option').remove();
                listarProveedores();
                $("#cps_proveedor option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})




function listarProveedores() {
    var datos = new FormData()

    datos.append("btnListarProveedores", true)

    $.ajax({
        type: "POST",
        url: './app/modulos/compras/compras.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            res.forEach(element => {

                $('#cps_proveedor').prepend(`<option value='${element.pvs_id}' >${element.pvs_nombre}</option>`);

            });




        }
    });
}
