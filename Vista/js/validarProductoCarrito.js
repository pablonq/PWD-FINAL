$(document).ready(function () {  /* Esto asegura que el código dentro de la función anónima se ejecute después de que el DOM esté completamente cargado */

  $("#formAgregarProducto").validate({ 
    rules: {
      cantidad: {
        required: true,
        esEntero: { esEntero: true },
        esMayorCero: { esMayorCero: true },
        noExcedeStock: { noExcedeStock: true }
      },
    },
    messages: {
      cantidad: {
        required: "Ingrese la cantidad que desea comprar",
        esEntero: "Solo puede ingresar números",
        esMayorCero: "Cantidad inválida",
        noExcedeStock: "La cantidad indicada excede el stock del producto"
      },

    },
    errorElement: "span",

    errorPlacement: function (error, element) { /* Estos dos bloques definen cómo se mostrarán los mensajes de error y dónde se colocarán en el DOM. */
      error.addClass("invalid-feedback");
      element.closest(".contenedor-dato").append(error);
    },
    /*  highlight: function (element) {
         $(element).addClass("is-invalid").removeClass("is-valid");
     },
     unhighlight: function (element) {
         $(element).removeClass("is-invalid").addClass("is-valid");
     }, */

    submitHandler: function (form) { /* Esta función se ejecuta cuando el formulario se envía correctamente y pasa la validación. En este caso, se envían los datos del formulario mediante una solicitud AJAX a "action/agregarProductosCarrito.php". Si la respuesta es exitosa, se muestra un mensaje de éxito y se redirige al usuario a la página del carrito. Si hay un error, se muestra un mensaje de error. */

      var alertaMensajesElem = document.getElementById('alertaMensajes');
      alertaMensajesElem.innerHTML = "";

      var formData = $(form).serialize()

      $.ajax({
        url: "action/agregarProductosCarrito.php",
        type: "POST",
        dataType: "json",
        data: formData,
        async: false,

        complete: function (xhr, textStatus) {
          //console.log("La solicitud regreso");
        },
        success: function (respuesta, textStatus, xhr) {
          //console.log("La solicitud fue exitosa");

          if (respuesta.resultado == "exito") {

            const wrapper = document.createElement('div');
            wrapper.innerHTML = [
              '<div class="alert alert-success alert-dismissible" role="alert">',
              '   <div>' + respuesta.mensaje + '</div>',
              '</div>'
            ].join('');
            alertaMensajesElem.append(wrapper);

            $("#formAgregarProducto")[0].reset();
            window.location.href = "carrito.php";

          } else {

            const wrapper = document.createElement('div');
            wrapper.innerHTML = [
              '<div class="alert alert-danger alert-dismissible" role="alert">',
              '   <div>' + respuesta.mensaje + '</div>',
              '</div>'
            ].join('');
            alertaMensajesElem.append(wrapper);
          }

        },
        error: function (xhr, textStatus, errorThrown) {
          console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
          console.log(xhr.responseText);
        }
      });
    }
  });


});

jQuery.validator.addMethod("esEntero", function (value, element) {
  return this.optional(element) || (/^\d+$/.test(value));
}, "Solo se permite ingresar números");

jQuery.validator.addMethod("esMayorCero", function (value, element) {
  return this.optional(element) || (/^[1-9]\d*$/.test(value));
}, "Cantidad inválida");

jQuery.validator.addMethod("noExcedeStock", function (value, element) {
  return this.optional(element) || noExcedeStock(value);
}, "La cantidad indicada excede el stock del producto");

function noExcedeStock(value) {

  var idProductoValue = document.getElementById("idproducto").value;
  var formData = { 'cantidad': value, 'idproducto': idProductoValue };
  var resultado = false;

  console.log(formData);

  $.ajax({

    url: "action/noExcedeStock.php",
    type: "POST",
    data: formData,
    dataType: "json",
    async: false,

    success: function (respuesta) {
      //console.log(respuesta);

      if (respuesta.resultado == "exito") {
        resultado = true;
      }
    }

  });

  return resultado;
}
