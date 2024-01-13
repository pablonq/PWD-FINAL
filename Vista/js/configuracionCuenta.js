$(document).ready(function () {

    $("#realizarCambios").on("click", function(event) {

        //Evita recarga de página
        event.preventDefault();

        //Contenedor de mensajes de alerta
        var alertaMensajesElem = document.getElementById('alertaMensajes');
        alertaMensajesElem.innerHTML = "";

        //Elementos a actualizar
        var nombreUsuarioElem = document.getElementById("nombreUsuario");
        var mailUsuarioElem = document.getElementById("mailUsuario");
        var nombreUsuarioActivoElem = document.getElementById("nombreUsuarioActivo");
        
        var usnombreValue = document.getElementById("usnombre").value;
        var usmailValue = document.getElementById("usmail").value;
        var uspassValue = document.getElementById("uspass").value;
        var uspass2Value = document.getElementById("uspass2").value;

        if(usnombreValue != ""){

            formData = {"usnombre": usnombreValue};

            $.ajax({ 
                url: "action/cambiarUsNombre.php",
                type: "POST",
                dataType: "json",
                data: formData,
                async: false,
        
                complete: function(xhr, textStatus) {
                    //console.log("La solicitud regreso");
                },
                success: function(respuesta, textStatus, xhr) {
                    //console.log("La solicitud fue exitosa");

                    if (respuesta.resultado == "exito"){

                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = [
                            '<div class="alert alert-success alert-dismissible" role="alert">',
                            '   <div>' + respuesta.mensaje + '</div>',
                            '</div>'
                        ].join('');
                        alertaMensajesElem.append(wrapper);

                        nombreUsuarioElem.innerHTML = usnombreValue;
                        nombreUsuarioActivoElem.innerHTML = usnombreValue;
                        $("#formConfiguracionCuenta")[0].reset();

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
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
                    console.log(xhr.responseText);
                }
            });
        }

        if(usmailValue != ""){

            formData = {"usmail": usmailValue};

            $.ajax({ 
                url: "action/cambiarUsMail.php",
                type: "POST",
                dataType: "json",
                data: formData,
                async: false,
        
                complete: function(xhr, textStatus) {
                    //console.log("La solicitud regreso");
                },
                success: function(respuesta, textStatus, xhr) {
                    //console.log("La solicitud fue exitosa");

                    if (respuesta.resultado == "exito"){

                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = [
                            '<div class="alert alert-success alert-dismissible" role="alert">',
                            '   <div>' + respuesta.mensaje + '</div>',
                            '</div>'
                        ].join('');
                        alertaMensajesElem.append(wrapper);

                        mailUsuarioElem.innerHTML = usmailValue;
                        $("#formConfiguracionCuenta")[0].reset();

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
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
                    console.log(xhr.responseText);
                }
            });
        }

        if (uspassValue != ""){
            if (uspass2Value != ""){
                if (uspassValue == uspass2Value){
                    if (uspassValue.length >= 6){

                        uspassValue = CryptoJS.MD5(uspassValue).toString()
                        formData = {"uspass": uspassValue};

                        $.ajax({ 
                            url: "action/cambiarUsPass.php",
                            type: "POST",
                            dataType: "json",
                            data: formData,
                            async: false,
                    
                            complete: function(xhr, textStatus) {
                                //console.log("La solicitud regreso");
                            },
                            success: function(respuesta, textStatus, xhr) {
                                //console.log("La solicitud fue exitosa");
            
                                if (respuesta.resultado == "exito"){
            
                                    const wrapper = document.createElement('div');
                                    wrapper.innerHTML = [
                                        '<div class="alert alert-success alert-dismissible" role="alert">',
                                        '   <div>' + respuesta.mensaje + '</div>',
                                        '</div>'
                                    ].join('');
                                    alertaMensajesElem.append(wrapper);

                                    $("#formConfiguracionCuenta")[0].reset();
            
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
                            error: function(xhr, textStatus, errorThrown) {
                                console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
                                console.log(xhr.responseText);
                            }
                        });

                    } else {
                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = [
                            '<div class="alert alert-danger alert-dismissible" role="alert">',
                            '   <div>' + "Las contraseña ingresada debe tener al menos 6 carácteres." + '</div>',
                            '</div>'
                        ].join('');
                        alertaMensajesElem.append(wrapper);
                    }
                } else {
                    const wrapper = document.createElement('div');
                    wrapper.innerHTML = [
                        '<div class="alert alert-danger alert-dismissible" role="alert">',
                        '   <div>' + "Las contraseñas ingresadas no coinciden." + '</div>',
                        '</div>'
                    ].join('');
                    alertaMensajesElem.append(wrapper);
                }
            } else {
                const wrapper = document.createElement('div');
                wrapper.innerHTML = [
                    '<div class="alert alert-danger alert-dismissible" role="alert">',
                    '   <div>' + "Debe confirmar 2 veces su nueva contraseña si desea cambiarla." + '</div>',
                    '</div>'
                ].join('');
                alertaMensajesElem.append(wrapper);
            }
        }

        //$("#formConfiguracionCuenta")[0].reset();

    });

});