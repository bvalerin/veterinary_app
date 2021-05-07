/* sirve para cuando uno elije la especie escoge la raza segund el id*/

$(document).ready(function () {
    $(".select2").select2({
      theme: "bootstrap4",
    });
    
    $("#id_especie").on("change", function () {
        var id_especie = $(this).val();

        $.ajax({
            url: BASE_URL + "/Mascotas/especie_raza",
            type: "post",
            data: { "id_especie": id_especie },
            success: function (data) {
                //alert(data);
                $("#id_raza").html(data);
            }
        });
    });
})

