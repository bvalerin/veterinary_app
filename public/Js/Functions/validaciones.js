/*Validacion de Cedula*/
validarcedula = function () {
  numero = document.formacedula.cedula.value;
  /* alert(numero); */

  var suma = 0;
  var residuo = 0;
  var pri = false;
  var pub = false;
  var nat = false;
  var numeroProvincias = 24;
  var modulo = 11;

  /* Verifico que el campo no contenga letras */
  var ok = 1;
  for (i = 0; i < numero.length && ok == 1; i++) {
    var n = parseInt(numero.charAt(i));
    if (isNaN(n)) ok = 0;
  }
  if (ok == 0) {
    alert("No puede ingresar caracteres en el número");
    guardar.disabled = true;
    return false;
  }

  if (numero.length < 10) {
    alert("El número ingresado no es válido");
    guardar.disabled = true;
    return false;
  }

  /* Los primeros dos digitos corresponden al codigo de la provincia */
  provincia = numero.substr(0, 2);
  if (provincia < 1 || provincia > numeroProvincias) {
    alert("El código de la provincia (dos primeros dígitos) es inválido");
    guardar.disabled = true;
    return false;
  }

  /* Aqui almacenamos los digitos de la cedula en variables. */
  d1 = numero.substr(0, 1);
  d2 = numero.substr(1, 1);
  d3 = numero.substr(2, 1);
  d4 = numero.substr(3, 1);
  d5 = numero.substr(4, 1);
  d6 = numero.substr(5, 1);
  d7 = numero.substr(6, 1);
  d8 = numero.substr(7, 1);
  d9 = numero.substr(8, 1);
  d10 = numero.substr(9, 1);

  /* El tercer digito es: */
  /* 9 para sociedades privadas y extranjeros   */
  /* 6 para sociedades publicas */
  /* menor que 6 (0,1,2,3,4,5) para personas naturales */

  if (d3 == 7 || d3 == 8) {
    alert("El tercer dígito ingresado es inválido");
    guardar.disabled = true;
    return false;
  }

  /* Solo para personas naturales (modulo 10) */
  if (d3 < 6) {
    nat = true;
    p1 = d1 * 2;
    if (p1 >= 10) p1 -= 9;
    p2 = d2 * 1;
    if (p2 >= 10) p2 -= 9;
    p3 = d3 * 2;
    if (p3 >= 10) p3 -= 9;
    p4 = d4 * 1;
    if (p4 >= 10) p4 -= 9;
    p5 = d5 * 2;
    if (p5 >= 10) p5 -= 9;
    p6 = d6 * 1;
    if (p6 >= 10) p6 -= 9;
    p7 = d7 * 2;
    if (p7 >= 10) p7 -= 9;
    p8 = d8 * 1;
    if (p8 >= 10) p8 -= 9;
    p9 = d9 * 2;
    if (p9 >= 10) p9 -= 9;
    modulo = 10;
  }

  suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
  residuo = suma % modulo;

  /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
  digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

  /* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
  if (nat == true) {
    if (digitoVerificador != d10) {
      alert("El número de cédula es incorrecto.");
      guardar.disabled = true;
      return false;
    }
    if (digitoVerificador == d10) {
      guardar.disabled = false;
      return true;
    }
  }
  return true;
};

/*valida lo campor input solo se agrege numero charcode del 48 al 57 significa del 0 al 9*/
validarNumero = function (event) {
  if (event.charCode >= 48 && event.charCode <= 57) {
    return true;
  }
  return false;
};

$(document).ready(function () {
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {},
    });
    $("#formConsulta").validate({
      rules: {
        date: {
          required: true,
        },

        peso: {
          required: true,
        },
      },
      messages: {
        date: {
          required: "Fecha requerida",
        },
        peso: {
          required: "peso requerido",
        },
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
        $(element).removeClass("is-valid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
        $(element).addClass("is-valid");
      },
    });
  });
});

//creando valiadcion personalizada para no repetir usuario
jQuery.validator.addMethod(
  "usuario_existente",
  function (value, element) {
    let bandera;

    $.ajax({
      type: "POST",
      url: BASE_URL + "/Servicios/servisceVerification",
      data: {
        nombre:nombre,
      },
      async: false,
      success: function (response) {
        if (response == "success") {
          bandera = false;
        } else {
          bandera = true;
        }
      },
    });

    return bandera;
  },
  "*El usuario ya existe por favor ingrese uno diferente"
);

$(document).ready(function () {
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {},
    });
    $("#formServicios").validate({
      rules: {
        nombre: {
          required: true,
          minlength: 7,
        },

        peso: {
          required: true,
        },
      },
      messages: {
        nombre: {
          required: "Fecha requerida",
          minlength: "*Tu username debe tener al menos 7 caracteres",
        },
        peso: {
          required: "peso requerido",
        },
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
        $(element).removeClass("is-valid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
        $(element).addClass("is-valid");
      },
    });
  });
});
