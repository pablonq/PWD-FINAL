
    function merkPago(respMerk) {
        // Obtener el modal por su id
        var modal = document.getElementById("merkPago");
        // Mostrar el modal cambiando el estilo display a "block"
        modal.style.display = "block";
        // Mostrar el valor de respMerk dentro del modal
        var modalContent = document.getElementById("modalContent");
        modalContent.innerHTML = "Respuesta de MercadoPago: " + respMerk;
    }

