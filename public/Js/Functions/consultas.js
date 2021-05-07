$(document).ready(function () {

  $('body').on('keyup', '#nombre', ({  target }) => {

    $.ajax({
      url: BASE_URL + "/Servicios/searchServiceByName",
      type: "post",
      dataType:"json",
      data: {
        nombre: target.value
      },
      success: (r) => {
        if(r.existe){
          $("#nombre").addClass("is-invalid");
          $("#nombre").closest(".form-group").remove("#nombre-error");
          $("#nombre").closest(".form-group").append('<span id="nombre-error" class="error invalid-feedback" style="display: inline;">*Nombre registrado</span>');
        }else{
        }
      },
    });

    return false;
  });


  $(".select2").select2({
    theme: "bootstrap4",
  });

  $("#tablaProductos").DataTable();
  $("#agregar_servicio").on("click", function () {
    let idServicio = $("#id_servicio").val();
    let observacion = $("#observacion").val();

    let tabla = $("#tablaProductos").DataTable();

    tabla.row
      //agrega los registro y lo muestra como tabla
      .add([
        $("#id_servicio option:selected").html(),
        "<input type='hidden' name='id_servicio_table' value=" +
          idServicio +
          "><input type='hidden' name='observacion_table' value='" +
          observacion +
          "'><input type='hidden' name='precio' value='" +
          $("#id_servicio option:selected").attr("rel") +
          "'>" +
          $("#observacion").val(),
        "$" + $("#id_servicio option:selected").attr("rel"),
        "<button type='button' class='btn btn-danger' onclick='eliminarRow(this)'><span class='fas fa-trash'></span></button>",
      ])

      //todo lo que esta aqui muestralo
      .draw();
    $("#observacion").val("");
  });
  $("#guardar").click(guardarConsulta);
  $("#print_hojavida").click(printHojav);

  function guardarConsulta() {
    var array = [];

    $("#tablaProductos tbody tr").each(function () {
      var values = [];
      $(this)
        .find("input")
        .each(function () {
          values.push(this.value);
        });
      array.push(values);
    });

    //console.log(array);

    let id_mascota = $("#id_mascota").val();
    let id_consulta = $("#id_consulta").val();
    let date = $("#date").val();
    let peso = $("#peso").val();

    if ($("#date").val() != "" || $("#peso").val() != "") {
      $.ajax({
        url: BASE_URL + "/Consulta/insertar",
        type: "post",
        data: {
          id_mascota: id_mascota,
          date: date,
          peso: peso,
          datos: array,
          id_consulta: id_consulta,
        },
        success: function (data) {
          $("#id_raza").html(data);
          window.location = BASE_URL + "/consulta/index/" + id_mascota;
        },
      });
    }
  }
});

function eliminarRow(e) {
  $("#observacion").val("");
  let tabla = $("#tablaProductos").DataTable();
  tabla.row($(e).parents("tr")).remove().draw();
}

function ver_consulta(idconsulta) {
  $("#detalleConsultaTable").DataTable().clear().draw();
  $("#detalleConsultaTable tbody").empty();
  $.ajax({
    url: BASE_URL + "/consulta/detalles",
    method: "GET",
    data: { idconsulta: idconsulta },
    success: function (resultado) {
      var obj = JSON.parse(resultado);
      console.log(obj);
      let table = $("#detalleConsultaTable").DataTable();
      if (obj.flag) {
        let divEncabezado = "";
        let divEncabezado2 = "";
        let total = 0;
        divEncabezado +=
          "<p><strong>Fecha: " + obj.dataconsulta[0].fecha + " </strong></p>";
        divEncabezado +=
          "<p><strong>Cliente: " +
          obj.dataconsulta[0].nombre_cliente +
          " </strong></p>";
        divEncabezado +=
          "<p><strong>Mascota: " +
          obj.dataconsulta[0].mascota +
          " </strong></p>";
        divEncabezado +=
          "<p><strong>Especie: " +
          obj.dataconsulta[0].especie +
          " </strong></p>";
        $("#encabesado").html(divEncabezado);

        divEncabezado2 +=
          "<p><strong>Raza: " + obj.dataconsulta[0].raza + " </strong></p>";
        divEncabezado2 +=
          "<p><strong>Fecha de nacimiento: " +
          obj.dataconsulta[0].fechaNac +
          " </strong></p>";
        divEncabezado2 +=
          "<p><strong>Peso: " +
          obj.dataconsulta[0].pesoMascota +
          " </strong></p>";

        obj.dataservicio.forEach(function (servicio) {
          table.row
            .add([
              servicio.fecha,
              servicio.servicio,
              servicio.observacion,
              "$" + servicio.precio,
            ])
            .draw();
          total += parseFloat(servicio.precio);
        });
        divEncabezado2 +=
          "<p><strong>Total $: " + total.toFixed(2) + " </strong></p>";

        $("#encabesado2").html(divEncabezado2);
      }
    },
  });
}
function printHojav() {
  let idMascota = $("#idMascota").val();
  window.open(
    BASE_URL + "/Consulta/imprimirhojavida?id=" + idMascota,
    "_blank"
  );
}
function print_consulta(idconsulta) {
  window.open(
    BASE_URL + "/Consulta/imprimirconsulta?id=" + idconsulta,
    "_blank"
  );
}
