listarCategorias();

$("#formAddCategoria").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearCategoria", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/gastos/gastos.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#gts_nombre").val("")
                $("#gts_presupuesto").val("")

                $('#mdlCategoria').modal('hide')

                $('#tgts_categoria option').remove();
                listarCategorias();
                $("#tgts_categoria option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})




function listarCategorias() {
    var datos = new FormData()

    datos.append("btnListarCategorias", true)

    $.ajax({
        type: "POST",
        url: './app/modulos/gastos/gastos.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            res.forEach(element => {

                $('#tgts_categoria').prepend(`<option value='${element.gts_id}' >${element.gts_nombre}</option>`);

            });




        }
    });
}


$(".btnListarGastosCat").on("click", function () {
    $("#lista-gastos-categoria").removeClass('d-none')
    $("#lista-gastos").addClass('d-none')

})

$(".btnListarGastos").on("click", function () {
    $("#lista-gastos").removeClass('d-none')
    $("#lista-gastos-categoria").addClass('d-none')

})